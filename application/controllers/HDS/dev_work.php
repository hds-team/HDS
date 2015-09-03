<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Dev_work extends HDS_Controller {

	public function index(){
		//echo "Dev_work";
		//------GET SYSTEM NAME AND ID
		$data['system'] = 0;
		//---LOOP content BY ID AND SET NAME TO ARRAY

		//$data['pending']['name'] = 0;
		//$data['ongoing']['name'] = 0;
		//$data['approve']['name'] = 0;

		//--------Prototype
		$data_content['pending'] = $this->pending();
		$data_content['ongoing'] = $this->ongoing();
		$data_content['approve'] = $this->approve();

		$data['content'] = $this->hds_output('dev_work/main_dev_work', $data_content, true);
		$this->layout_output($data);

	}

	public function approve(){
		include('dev_work_part/approve.php');
		return $view;
	}

	public function pending(){
		include 'dev_work_part/pending.php';
		return $view;
	}

	public function ongoing(){
		include('dev_work_part/ongoing.php');
		return $view;
	}

}