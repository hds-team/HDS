<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_ongoing extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	public function get_request($sys_id) //get request and  status 
	{
		$this->hds
		->select('*')
		->from('hds_v1.hds_request')
		->join('hds_v1.hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner') //inner category and request
		->join('hds_v1.hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner') //inner kind and request
		->join('hds_v1.hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner') //inner join status
		->join('ums.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner') //join ums
		->where('hds_request.rq_sys_id',$sys_id) //system's ums
		->where('hds_request.rq_st_id',4); //status sending
		$query = $this->hds->get();
		return $query;
	}
	

}