<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."../../../HDS_Model.php");
class M_ongoing extends HDS_Model{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_request() //get request and  status 
	{
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner') //inner category and request
		->join('hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner') //inner kind and request
		->join('hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner');

		$query = $this->hds->get();
		return $query;
	}
	public function get_ums($rq_mb_id){
		$this->ums
		->select('*')
		->from('umuser')
		->where('UsID',$rq_mb_id);
		$query_1 = $this->ums->get();
		return $query_1;
	}
	

}