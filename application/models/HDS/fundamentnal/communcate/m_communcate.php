<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_communcate extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
		
	public function get_contract(){ 
		$this->hds
		->select('*')
		->from('hds_contact_type')
		->join('hds_contact_log','hds_contact_type.ctt_id = hds_contact_log.ctl_ctt_id','left')
		->join('hds_request','hds_contact_log.ctl_rq_id = hds_request.rq_id','left')
		->group_by('ctt_id');
		return $this->hds->get();
	}
}
?>