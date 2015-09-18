<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_category extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
		
	public function get_category(){ 
		$this->hds
		->select('*')
		->from('hds_category')
		->join('hds_request','hds_category.ct_id = hds_request.rq_ct_id','left')
		->group_by('ct_id');
		return $this->hds->get();
	}
}
?>