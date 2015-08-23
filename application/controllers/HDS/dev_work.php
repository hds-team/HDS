<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Dev_work extends HDS_Controller {
	public function index(){
		echo "Dev_work";
		//------GET SYSTEM NAME AND ID
		$data['system'] = 0;
		//---LOOP content BY ID AND SET NAME TO ARRAY

		$data['check']['name'] = 0;
		$data['check_now']['name'] = 0;
		$data['petition']['name'] = 0;

		$data['content'] = $this->hds_output('dev_work/main_dev_work');
		$this->layout_output($data);
	}

	public function approve(){
		include('dev_work_part/approve.php');
	}

	public function pending(){
		include('dev_work_part/pending.php');
	}

	public function ongoing(){
		include('dev_work_part/ongoing.php');
	}

}