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
		->where('rq_mb_id', $rq_mb_id)
		->order_by('rq_date', 'desc');
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

	public function get_copy_detail_report($rq_id){
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_request.rq_ct_id = hds_category.ct_id', 'inner')
		->join('hds_kind', 'hds_request.rq_kn_id = hds_kind.kn_id', 'inner')
		->join('hds_level_log', 'hds_request.rq_id = hds_level_log.lg_rq_id', 'inner')
		->join('hds_level', 'hds_level.lv_id = hds_level_log.lg_lv_id', 'inner')
		->join('ums.umdepartment', 'hds_request.rq_comp_id = ums.umdepartment.dPId', 'inner')
		->join('ums.umuser', 'hds_request.rq_mb_id = ums.umuser.UsID', 'inner')
		->join('ums.umsystem', 'hds_request.rq_sys_id = ums.umsystem.StId', 'inner')
		->where('rq_id',$rq_id);
		return $this->hds->get();
	}
	
	public function get_copy_detail_contact($rq_id){
		$this->hds
		->select('*')
		->from('hds_contact_log')
		->join('hds_contact_type', 'hds_contact_log.ctl_ctt_id = hds_contact_type.ctt_id', 'inner')
		->where('ctl_rq_id', $rq_id);
		return $this->hds->get();
	}
	

}