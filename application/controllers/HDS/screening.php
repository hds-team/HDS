<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Screening extends HDS_Controller {
	public function index(){
		echo "Screening";
		//------GET SYSTEM NAME AND ID
		$data['system'] = 0;
		//---LOOP content BY ID AND SET NAME TO ARRAY

		$data['check']['name'] = 0;
		$data['check_now']['name'] = 0;
		$data['petition']['name'] = 0;

		$data['content'] = $this->hds_output('screening/main_screening');
		$this->layout_output($data);
	}

	public function check($sys_id=""){ //get content by system id
		include('screening_part/check.php');
	}

	public function check_now($sys_id=""){ //get content by system id
		include('screening_part/check_now.php');
	}

	public function petition($sys_id=""){ //get content by system id
		include('screening_part/petition.php');
	}
}