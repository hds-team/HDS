<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../HDS_Model.php");
class M_approve extends CI_Model
{
	public $db_name;
	public $ums;
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
		$this->load->model('HDS/dev_work/m_dev_work');

		$this->load->config('hds_config');
		$this->db_name = $this->config->item('database');
		$this->ums = $this->config->item('UMS');
	}

	public function get_report($sys_id)
	{
		$where = "( hds_request.rq_st_id = 6)";
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner')
		->join('hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner')
		->join('hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner')
		->join($this->ums.'.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner')
		->join($this->ums.'.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->where($where)
		->where('hds_request.rq_sys_id', $sys_id)
		->order_by('hds_request.rq_date', 'DESC');

		return $this->hds->get();
	}//Close the function's get_report 

	public function get_report_all($UsID){
		$query = $this->m_dev_work->get_system_by_permiss($UsID);
		$where_1 = "(hds_request.rq_st_id = 6)";
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner')
		->join('hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner')
		->join('hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner')
		->join($this->ums.'.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner')
		->join($this->ums.'.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->where($where_1)
		->order_by('hds_request.rq_date', 'DESC');

		$index = 1;
		foreach($query->result() as $row){
			if($index == 1){
				$where_2 = "(rq_sys_id = ".$row->StID;
			}else{
				$where_2 .= " or rq_sys_id = ".$row->StID;
			}
			$index++;
		}
		$where_2 .= ")";
		$this->hds->where($where_2);

		return $this->hds->get();
	}


}//Close the class
