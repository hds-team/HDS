<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_category extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
		
	public function get_level(){ 
		$this->hds
		->select('*')
		->from('hds_level')
		->join('hds_level_log','hds_level.lv_id = hds_level_log.lg_lv_id','left')
		->group_by('lv_id');
		return $this->hds->get();
	}
}
?>