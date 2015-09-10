<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Dev_work extends HDS_Controller {

	public function index($sys_id=NULL){
		//echo "Dev_work";
		//------GET SYSTEM NAME AND ID
		if($this->input->post('system') == NULL){
			$data['system'] = $sys_id;
		}else{
			$data['system'] = $this->input->post('system');
		}
		//------ Check id of system
		if($data['system'] == NULL){
			$data_content['system_st'] = 0; //not have sys id set non display
			$data_content['system_select'] = 0; //set for select in dropdown default
		}else{
			$data_content['system_st'] = 1; //have set display report
			$data_content['system_select'] = $data_content['system_st']; //set for select in dropdown to curreny system
			$data_content['pending'] = $this->pending($data['system']);
			$data_content['ongoing'] = $this->ongoing($data['system']);
			$data_content['approve'] = $this->approve($data['system']);
		}

		$data_content['system'] = $this->m_dynamic->get_all('ums.umsystem');
		$data['content'] = $this->hds_output('dev_work/main_dev_work', $data_content, true);
		$this->layout_output($data);

	}

	public function approve($sys_id = 10){
		include('dev_work_part/approve.php');
		return $view;
	}

	public function pending($sys_id = 10){
		include ('dev_work_part/pending.php');
		return $view;
	}
	
	public function pending_update($rq_id){
		include ('dev_work_part/pending_update.php');
	}

	public function ongoing($sys_id = 10){
		include('dev_work_part/ongoing.php');
		
		return $view;
	}
	public function update_status($rq_id,$st_id){
		include('dev_work_part/update_ongoing.php');
	}
	public function update_approve($rq_id, $st_id){
		include('dev_work_part/update_approve.php');
	}

}