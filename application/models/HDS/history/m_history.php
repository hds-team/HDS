<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_history extends CI_Model
{
	public $db_name;
	public $ums;
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
		$this->load->model('HDS/dev_work/m_dev_work');

		$this->config->load('hds_config');
		$this->db_name = $this->config->item('database');
		$this->ums = $this->config->item('UMS');
	}

	public function get_request($rq_sys_id) //get request and  status
	{
		$this->hds
		->select('*')
		->from($this->db_name.'.hds_accept_log')
		->join($this->db_name.'.hds_request', 'hds_accept_log.al_rq_id = hds_request.rq_id', 'inner') //inner hds_accept_log and request
		->join($this->db_name.'.hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner')
		->join($this->db_name.'.hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner')
		->join($this->db_name.'.hds_status', 'hds_request.rq_st_id = hds_status.st_id', 'inner') //inner status and request
		->join($this->ums.'.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->join($this->ums.'.umdepartment', 'umdepartment.dpID = hds_request.rq_comp_id', 'inner')
		->where('al_mb_id', $this->session->userdata('UsID')) //check session
		->where('hds_request.rq_sys_id', $rq_sys_id);
		$query = $this->hds->get();
		return $query;
	}
	public function get_depart() //get category and  request
	{
		$this->hds
		->select('*')
		->from($this->ums.'.umdepartment');
		$query = $this->hds->get();
		return $query;
	}
	public function get_system() //get category and  request
	{
		$this->hds
		->select('*')
		->from($this->ums.'.umsystem');
		$query = $this->hds->get();
		return $query;
	}
}