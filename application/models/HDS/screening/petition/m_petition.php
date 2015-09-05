<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_petition extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	
	public function get_all(){
		$this->hds
			->select('*')
			->from('hds_request');
			
		return $this->hds->get();
	}
}
