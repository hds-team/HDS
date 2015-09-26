<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."/HDS_Model.php");
class M_reply extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
		$this->load->config('hds_config');
	}

	public function get_request($rq_id) //get request's system
	{
		$db = $this->config->item('database');
		$this->hds
		->select('*')
		->from($db.'.hds_request')
		->join($db.'.hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner') //inner category and request
		->join($db.'.hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner') //inner kind and request
		->join($db.'.hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner') //inner join status
		->join($db.'.hds_level_log','hds_level_log.lg_rq_id = hds_request.rq_id','inner') //don't where rq_id because hds_level_log have rq_id
		->join($db.'.hds_file','hds_file.fl_rq_id = hds_request.rq_id','inner')
		->join($db.'.hds_level',' hds_level.lv_id = hds_level_log.lg_lv_id','inner')
		->join('ums.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner') //join ums
		->join('ums.umsystem','umsystem.StID = hds_request.rq_sys_id', 'inner');
		//->where('hds_request.rq_id',$rq_id); //system's ums
		$query = $this->hds->get();
		return $query;
	}
	/*
	public function get_chat($rq_id, $status){
		$this->hds
		->select('*')
		->from('hds_reply')
		->where('hds_reply.rp_rq_id', $rq_id); 
		return $this->hds->get();
	}
	*/
}