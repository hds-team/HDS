<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_ongoing extends CI_Model
{
	public $db_name;
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
		$this->config->load('hds_config');
		$this->db_name = $this->config->item('database');
	}

	public function get_request($sys_id) //get request and  status 
	{
		$this->hds
		->select('*')
		->from($this->db_name.'.hds_request')
		->join($this->db_name.'.hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner') //inner category and request
		->join($this->db_name.'.hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner') //inner kind and request
		->join($this->db_name.'.hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner') //inner join status
		->join('ums.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner') //join ums
		->where('hds_request.rq_sys_id',$sys_id) //system's ums
		->where('hds_request.rq_st_id',4); //status sending
		$query = $this->hds->get();
		return $query;
	}

	public function get_request_all() //get request and  status 
	{
		$this->hds
		->select('*')
		->from($this->db_name.'.hds_request')
		->join($this->db_name.'.hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner') //inner category and request
		->join($this->db_name.'.hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner') //inner kind and request
		->join($this->db_name.'.hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner') //inner join status
		->join('ums.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner') //join ums
		->join('ums.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->where('hds_request.rq_st_id', 4); //status sending
		$query = $this->hds->get();
		return $query;
	}
	

}