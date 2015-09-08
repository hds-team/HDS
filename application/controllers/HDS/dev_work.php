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

}