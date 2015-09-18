<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_pending extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	
	//Function get value in database hds_v1.
	public function get_pending($sys_id)
	{
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category','hds_category.ct_id = hds_request.rq_ct_id','inner')
		->join('hds_kind','hds_kind.kn_id = hds_request.rq_kn_id','inner')
		->join('ums.umuser','ums.umuser.UsId = hds_request.rq_mb_id','inner')
		->where('hds_request.rq_sys_id',$sys_id)
		->where('hds_request.rq_st_id',2)
		->or_where('hds_request.rq_st_id',3);
		return $this->hds->get();
	}

	public function get_pending_all()
	{
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category','hds_category.ct_id = hds_request.rq_ct_id','inner')
		->join('hds_kind','hds_kind.kn_id = hds_request.rq_kn_id','inner')
		->join('ums.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->join('ums.umuser','ums.umuser.UsId = hds_request.rq_mb_id','inner')
		->where('hds_request.rq_st_id',2)
		->or_where('hds_request.rq_st_id',3);
		return $this->hds->get();
	}
}
?>