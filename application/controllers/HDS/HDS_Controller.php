<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class HDS_Controller extends UMS_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('HDS/m_dynamic');
		$this->load->library('date_time');
	}

	public function index(){
		echo "TEST";
	}

	public function hds_output($file="System_name/welcome", $data=NULL, $no_display=false){
		$file = "/HDS/".$file;
		return $this->load->view($file, $data, $no_display);
	}

	public function layout_output($data=NULL){
		$this->output('/HDS/menu/layout', $data);
	}

}
