<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Screening extends HDS_Controller {
	public function index(){
		//echo "Screening";
		//------GET SYSTEM NAME AND ID
		$data['system'] = 0;
		//---LOOP content BY ID AND SET NAME TO ARRAY

		$data['check']['name'] = 0;
		$data['check_now']['name'] = 0;
		$data['petition']['name'] = 0;

		//---------Prototye
		$data_content['check'] = $this->check();
		$data_content['check_now'] = $this->check_now();
		$data_content['petition'] = $this->petition();

		$data['content'] = $this->hds_output('screening/main_screening', $data_content, true);
		$this->layout_output($data);
	}

	public function check($sys_id=""){ //get content by system id
		include('screening_part/check.php');
		return $view;
	}

	public function check_now($sys_id=""){ //get content by system id
		include('screening_part/check_now.php');
		return $view;
	}

	public function petition($sys_id=""){ //get content by system id
		include('screening_part/petition.php');
		return $view; 
	}
}

// Comment กกกกกก