<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."../../HDS_Model.php");
class M_dynamic extends HDS_Model{
	
	//<!------get_all ums------>
	public function get_all(){
		$this->ums
		->select('*')
		->from('umuser');
		return $this->umuser->get();
	}


}