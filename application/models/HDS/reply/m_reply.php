<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."/HDS_Model.php");
class M_reply extends CI_Model
{
	public $db_name;
	public $ums_part;

	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
		$this->load->config('hds_config');

		$this->config->load('hds_config');
		$this->db_name = $this->config->item('database');
		$this->ums_part = $this->config->item('UMS');
	}

	public function get_request($rq_id) //get request's system
	{
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner') //inner category and request
		->join('hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner') //inner kind and request
		->join('hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner') //inner join status
		->join($this->ums_part.'.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner') //join ums
		->join($this->ums_part.'.umsystem','umsystem.StID = hds_request.rq_sys_id', 'inner')
		->join($this->ums_part.'.umdepartment','umdepartment.dpID = hds_request.rq_comp_id', 'inner')

		->join('hds_level_log', 'hds_level_log.lg_rq_id = hds_request.rq_id')
		->join('hds_level', 'hds_level.lv_id = hds_level_log.lg_lv_id')
		->where('hds_request.rq_id',$rq_id); //system's ums
		$query = $this->hds->get();
		return $query;
	}

	public function get_file($rq_id){
		$this->hds
		->select('*')
		->from('hds_file')
		->where('fl_rq_id', $rq_id);
		return $this->hds->get();
	}

	public function actor_check($mb_id){
		$this->ums
		->select('umgroup.GpNameT, umgroup.GpID')
		->from('umusergroup')
		->join('umgroup', 'umgroup.GpID = umusergroup.UgGpID', 'inner')
		->where('umgroup.GpStID', $this->config->item('sys_id'))
		->where('umusergroup.UgUsID', $mb_id);
		return $this->ums->get();
	}

	public function timeline($rp_msg_type, $rq_id){
		$this->hds
		->select('*')
		->from('hds_reply')
		->join($this->ums_part.'.umuser', 'umuser.UsID = hds_reply.rp_mb_id', 'inner')
		->join($this->ums_part.'.umusergroup', 'umuser.UsID = umusergroup.UgUsID', 'inner')
		->join($this->ums_part.'.umgroup', 'umgroup.GpID = umusergroup.UgGpID', 'inner')

		->where('hds_reply.rp_msg_type', $rp_msg_type)
		->where('hds_reply.rp_rq_id', $rq_id)
		->group_by('rp_id')
		->order_by('rp_id', "asc");
		return $this->hds->get();
	}
	public function get_system(){
		$this->ums
		->select('*')
		->from('umsystem');
		return $this->ums->get();
	}
	public function get_department(){
		$this->ums
		->select('*')
		->from('umdepartment');
		return $this->ums->get();
	}
	public function get_accept_log($rq_id){
		$this->hds
		->select('*')
		->from('hds_accept_log')
		->where('al_rq_id',$rq_id)
		->where('al_st_id', 6);
		return $this->hds->get();
	}
}