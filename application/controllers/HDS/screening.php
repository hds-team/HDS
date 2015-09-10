<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Screening extends HDS_Controller {
	public function index(){

		//echo "Screening";
		//------GET SYSTEM NAME AND ID
		$data['system'] = $this->input->post('system');

		//------ Check id of system
		if($data['system'] == NULL){
			$data_content['system_st'] = 0; //not have sys id set non display
			$data_content['system_select'] = 0; //set for select in dropdown default
		}else{
			$data_content['system_st'] = 1; //have set display report
			$data_content['system_select'] = $data['system']; //set for select in dropdown curreny system

			$data_content['check'] = $this->check($data['system']);
			$data_content['check_now'] = $this->check_now($data['system']);
			$data_content['petition'] = $this->petition($data['system']);
		}

		$data_content['system'] = $this->m_dynamic->get_all('ums.umsystem');
		$data['content'] = $this->hds_output('screening/main_screening', $data_content, true);
		$this->layout_output($data);
	}

	public function check($sys_id=10){ //get content by system id
		include('screening_part/check.php');
		return $view;
	}

	public function check_now($sys_id= 10){ //get content by system id
		include('screening_part/check_now.php');
		return $view;
	}

	public function petition($sys_id=10){ //get content by system id
		include('screening_part/petition.php');
		return $view; 
	}
	public function update_check($rq_id,$st_id){
		include('screening_part/update_check.php');
	}
	public function update_petition_accect($rq_id,$st_id){
		include('screening_part/update_petition_accept.php');
	}
	public function update_petition_complete($rq_id,$st_id){
		include('screening_part/update_petition_complete.php');
	}
	
}

// Comment กกกกกก