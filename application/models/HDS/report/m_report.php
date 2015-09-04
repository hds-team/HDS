<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_report extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}

	public function get_category() //get request and  status 
	{
		$this->hds
		->select('*')
		->from('hds_category')
		->where('ct_status', 1);
		return $this->hds->get();
	}

	public function get_kind() //get request and  status 
	{
		$this->hds
		->select('*')
		->from('hds_kind')
		->where('kn_status', 1);
		return $this->hds->get();
	}

	public function get_max_rq_id(){
		$this->hds
		->select_max('rq_id')
		->from('hds_request');
		return $this->hds->get();
	}


	

}