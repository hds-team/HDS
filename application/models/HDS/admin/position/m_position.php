<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_position extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);	
	}
	//--------get_all ums----------
	public function get_all(){
		$this->ums
		->select('*')
		->from('umuser');
		return $this->ums->get();
	}
}