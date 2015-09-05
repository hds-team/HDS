<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."/HDS_Model.php");
class M_reply extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}

	public function get_request($rq_id) //get request's system
	{
		$this->hds
		->select('*')
		->from('hds_v1.hds_request')
		->join('hds_v1.hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner') //inner category and request
		->join('hds_v1.hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner') //inner kind and request
		->join('hds_v1.hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner') //inner join status
		->join('ums.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner') //join ums
		->where('hds_request.rq_id',$rq_id); //system's ums
		$query = $this->hds->get();
		return $query;
	}

	public function get_chat($rq_id, $status){
		$this->hds
		->select('*')
		->from('hds_reply')
		->join('hds_position', 'hds_position.ps_mb_id = hds_reply.rp_mb_id', 'left')
		->where('hds_reply.rp_rq_id', $rq_id)
		->where('hds_position.ps_ut_id', 3) // status 2 is position check
		->or_where('hds_position.ps_ut_id', $status); 
		return $this->hds->get();
	}

}