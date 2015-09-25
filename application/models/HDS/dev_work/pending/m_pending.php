<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_pending extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
		$this->load->model('HDS/dev_work/m_dev_work');
	}
	
	//Function get value in database hds_v1.
	public function get_pending($sys_id)
	{
		$where = "(hds_request.rq_st_id = 2 or hds_request.rq_st_id = 3)";
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category','hds_category.ct_id = hds_request.rq_ct_id','inner')
		->join('hds_kind','hds_kind.kn_id = hds_request.rq_kn_id','inner')
		->join('ums.umuser','ums.umuser.UsID = hds_request.rq_mb_id','inner')
		->where($where)
		->where('hds_request.rq_sys_id',$sys_id);
		return $this->hds->get();
	}

	public function get_pending_all($UsID){

		$query = $this->m_dev_work->get_system_by_permiss($UsID);
		$where_1 = "(hds_request.rq_st_id = 2 or hds_request.rq_st_id = 3)";

		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner')
		->join('hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner')
		->join('hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner')
		->join('ums.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner')
		->join('ums.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->where($where_1);

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
}
?>