<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_estimation_time extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
		
	public function get_contract(){ 
		$this->hds
		->select('*')
		->from('hds_contract')
		->join('hds_request','hds_contract.ctr_id = hds_request.rq_ctr_id','left')
		->group_by('ctr_id');
		return $this->hds->get();
	}
}
?>