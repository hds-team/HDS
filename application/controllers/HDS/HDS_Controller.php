<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class HDS_Controller extends UMS_Controller {
	public function index(){
		echo "TEST";
	}

	public function hds_output($file="System_name/welcome"){
		$file = "/HDS/".$file;
		$this->output($file);
	}

	public function menu_output($data){
		$this->hds_output('layout',$data);
	}

}
