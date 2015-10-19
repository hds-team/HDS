<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_report extends CI_Model
{
	public $ums_part;
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);

		$this->load->config('hds_config');
		$this->ums_part = $this->config->item('UMS');
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

	public function get_level() //get request and  status 
	{
		$this->hds
		->select('*')
		->from('hds_level')
		->where('lv_status', 1);
		return $this->hds->get();
	}

	public function get_max_rq_id(){
		$this->hds
		->select_max('rq_id')
		->from('hds_request');
		return $this->hds->get();
	}

	public function get_detail($rq_mb_id){
		$this->hds
		->select('*')
		->from('hds_request')
		->join($this->ums_part.'.umsystem', 'hds_request.rq_sys_id = umsystem.StID', 'inner')
		->join('hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner')
		->where('rq_mb_id', $rq_mb_id);
		return $this->hds->get();
	}

	public function get_system_by_user($UsID){
		$this->ums
		->select('*')
		->from('umusergroup')
		->join('umgroup', 'umusergroup.UgGpID = umgroup.GpID', 'inner')
		->join('umsystem', 'umsystem.StID = umgroup.GpStID', 'inner')
		->where('umusergroup.UgUsID', $UsID)
		->where('umsystem.StID !=', 10)
		->group_by('umgroup.GpStID');
		return $this->ums->get();
	}


	

}