<?php
	include_once('classlib.php');
	class Gen_data
	{
		private $personId;
		private $CI;
		private $ppc_db;
		private $emt_db;
		private $ps;
		private $mt;
		private $cms;
		private $obj;
		private $match;
		private $type;

		function __construct($type = 1,$token=NULL)
		{
			$this->type = $type;
			$this->CI =&get_instance();
			$this->ppc_db = $this->CI->config->item('emt_ppc_db');
			$this->emt_db = $this->CI->config->item('emt_db');
			$this->emt_path = $this->CI->config->item('emt_path');
			$this->obj = array();
			switch($type)
			{
				case 1: // for person object
					$this->personId = $token;
					break;
				case 2: // for meeting object
					$this->mt_id = $token; 
					break;
				case 3: // for commission object
					$this->cms_id = $token;
					break;
			}
			$this->__set_object();
			unset($this->CI);
			if(!is_null($token))
				return $this->get_ins($token);

		}

		function __set_object()
		{
			$rs = $this->__get_query();
			if(($fd = $this->__list_fields($rs))!== FALSE)
			{
				switch($this->type)
				{
					case 1:;
						foreach($rs->result() as $row)
						{
							$this->obj[$row->personId] = new LPerson($row,$fd);
						}
					break;
					case 2:;
						foreach($rs->result() as $row)
						{
							$this->obj[$row->mt_id] = new LMeeting($row,$fd);
						}
					break;
					case 3:;
						foreach($rs->result() as $row)
						{
							$this->obj[$row->cms_id] = new LCommission($row,$fd);
						}
					break;
				}
			}
		}

		function get_ins($index)
		{
			return $this->obj[$index];
		}

		function get_all_data()
		{
			return $this->obj;
		}

		function search_by_name($text)
		{
			foreach($this->ps as $key => $obj)
			{
				if(preg_match('/'.$text.'/',$obj->fName))
					$this->__push_match($obj->personId);
				if(preg_match('/'.$text.'/',$obj->lName))
					$this->__push_match($obj->personId);
			}
			return $this->match;
		}

		function __push_match($personId)
		{
			if(!array_key_exists($personId,$this->match))
				$this->match[$personId] = $this->get_ps($personId);
		}

		function __get_query()
		{
			$this->CI->load->model($this->emt_path.'m_person','mps');
			$this->CI->load->model($this->emt_path.'m_emt_meeting','mmt');
			$this->CI->load->model($this->emt_path.'m_emt_commission','mcms');
			$mps = $this->CI->mps;
			$mmt = $this->CI->mmt;
			$mcms = $this->CI->mcms;

			switch($this->type)
			{
				case 1: $mps->personId = NULL;
						if($this->personId != NULL || $this->personId != '')
							$mps->personId = $this->personId;
						$query = $mps->get_all_ps();
					break;
				case 2:$mmt->mt_id = $this->mt_id;
						$query = $mmt->get_info_meeting();
					break;
				case 3:$mps->cms_id = $this->cms_id;
						$query = $mcms->get_all();
					break;
			}
			return $query;
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
?>