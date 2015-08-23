<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class HDS_Controller extends UMS_Controller {
	public function index(){
		echo "TEST";
	}

	public function hds_output($file="System_name/welcome", $data=""){
		$file = "/HDS/".$file;
		return $this->load->view($file, $data, true);
	}

	public function layout_output($data=NULL){
		$this->output('/HDS/menu/layout', $data);
	}

}
