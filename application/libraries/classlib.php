<?php
	class Libmt
	{
		function __set_attr($obj,$attr)
		{
			foreach($attr as $index=>$key)
			{
				$this->$key = $obj->$key;
			}
		}

		function __list_fields($qry)
		{
			if(is_object($qry))
			{
				$list = array();
				foreach($qry->list_fields() as $fd)
				{
					$list[] = $fd;
				}
				return $list;
			}
			else
				return FALSE;
		}
	}

	class LPerson extends Libmt
	{
		function __construct($obj,$attr)
		{
			$this->__set_attr($obj,$attr);
		}
	}

	class LMeeting extends Libmt
	{
		private $ag;
		private $ps;
		private $CI;

		function __construct($obj,$attr)
		{
			$this->__set_attr($obj,$attr);
		}

		function get_agenda() // return array 
		{
			$this->CI = &get_instance();
			$this->CI->load->model($this->CI->config->item('emt_path').'m_emt_emeeting','mmt');
			$mmt = $this->CI->mmt;
			$mmt->mt_id = $this->mt_id;
			$str = '#####';
			$rs_parent = $mmt->get_ag_parent();
			$rs_ag = array();
			if($rs_parent->num_rows())
			{
				foreach($rs_parent->result() as $row)
				{
					$rs_ag[$row->agdt_id] = $this->CI->config->item('emt_ag_word').$row->agdt_seq.' '.$row->agdt_head.$str.$row->agdt_level.$str.$row->agdt_seq.$str.(($row->num_file !='')?$row->num_file:0).$str.$row->agdt_add.$str.(($row->agdt_ps_id == NULL)?0:$row->agdt_ps_id);
					$this->__rec_agenda($row->agdt_id,$rs_ag,$row->agdt_seq);

				}
			}
			unset($this->CI);
			return $rs_ag;
		}

		function get_ps() // return CI database object
		{
			$this->CI = &get_instance();
			$this->CI->load->model($this->CI->config->item('emt_path').'m_emt_participant','mpt');
			$mpt = $this->CI->mpt;
			$mpt->pnt_mt_id = $this->mt_id;
			$rs_pnt = $mpt->get_by_mt();
			unset($this->CI);
			return $rs_pnt;
		}

		function __rec_agenda($agdt_id,&$rs_ag,$no)
		{
			$str = '#####';
			$no = '&nbsp;&nbsp;'.$no;
			$this->CI->load->model($this->CI->config->item('emt_path').'m_emt_agenda_detail','magd');
			$magd = $this->CI->magd;
			$magd->agdt_parent_id = $agdt_id;
			$rs_child = $magd->getChildById();
			if($rs_child->num_rows() > 0)
			{
				foreach($rs_child->result() as $row)
				{
					$rs_ag[$row->agdt_id] = $no.'.'.$row->agdt_seq.'&nbsp;'.$row->agdt_head.$str.$row->agdt_level.$str.$row->agdt_seq.$str.(($row->num_file !='')?$row->num_file:0).$str.$row->agdt_add.$str.(($row->agdt_ps_id == NULL)?0:$row->agdt_ps_id);
					$this->__rec_agenda($row->agdt_id,$rs_ag,$no.'.'.$row->agdt_seq);
				}
			}
			else
				return ;
		}

		function get_parent_agenda($agdt_id)
		{
			$CI =&get_instance();
			$CI->load->model($CI->config->item('emt_path').'m_emt_agenda_detail','magd');
			$magd = $CI->magd;
			$magd->agdt_id = $agdt_id;
			$qu = $magd->get_by_key();
			while($qu->num_rows() > 0 && ($qu->row()->agdt_parent_id != 0 && $qu->row()->agdt_parent_id != NULL))
			{
				$magd->agdt_id = $qu->row()->agdt_parent_id;
				$qu = $magd->get_by_key();
			}
			unset($magd);
			unset($CI);
			return $qu;
		}
	}

	class LCommission extends Libmt
	{
		private $mt;
		
		function __construct($obj,$attr)
		{
			$this->__set_attr($obj,$attr);
			$this->__get_query();
		}

		function __get_query()
		{
			$CI = &get_instance();
			$CI->load->model($CI->config->item('emt_path').'m_emt_meeting','mmt');
			$mmt = $CI->mmt;
			$mmt->mt_id = NULL;
			$mmt->mt_cms_id = $this->cms_id;
			$rs_mt = $mmt->get_info_meeting();
			if($rs_mt->num_rows())
			{
				$fd = $this->__list_fields($rs_mt);
				foreach($rs_mt->result() as $row)
				{
					$this->mt[$row->mt_id] = new LMeeting($row,$fd);
				}
			}
			unset($CI);
		}

		function get_mt($mt_id ='') //return array object
		{
			if($mt_id =='')
				return $this->mt;
			else
				return $this->mt[$mt_id];
		}

		function get_ps_cms()
		{
			$CI = &get_instance();
			$CI->load->model($CI->config->item('emt_path').'m_emt_participant_tp','mptp');
			$mptp = $CI->mptp;
			$mptp->ptp_cms_id = $this->cms_id;
			$rs_pnt = $mptp->get_ps_by_cms();
			unset($CI);
			return $rs_pnt;
		}
	}
?>