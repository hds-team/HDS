<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Dev_work extends HDS_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->model('HDS/dev_work/m_dev_work');
	}

	public function index($sys_id=99)
	{
		$this->benchmark->mark('code_start');
		//echo "Dev_work";
		//------GET SYSTEM NAME AND ID
		if($this->input->post('system') == NULL)
		{
			$data['system'] = $sys_id;
		}
		else
		{
			$data['system'] = $this->input->post('system');
		}
		//------ Check id of system
		if($data['system'] == NULL)
		{
			$data_content['system_st'] = 0; //not have sys id set non display
			$data_content['system_select'] = 0; //set for select in dropdown default
		}
		else
		{
			$data_content['system_st'] = 1; //have set display report
			$data_content['system_select'] = $data['system']; //set for select in dropdown to curreny system

			if($data['system'] == 99)
			{
				$all = TRUE; // Show all systems
			}else{
				$all = FALSE;
			}
			$data_content['pending'] = $this->pending($data['system'], $all);
			$data_content['ongoing'] = $this->ongoing($data['system'], $all);
			$data_content['approve'] = $this->approve($data['system'], $all);
		}

		//$data_content['system'] = $this->m_dynamic->get_all('ums.umsystem');
		$data_content['system'] = $this->m_dev_work->get_system_by_permiss($this->session->userdata('UsID'));
		

		foreach($this->m_dev_work->notification()->result() as $row){
			$data_content['system_notification'][$row->rq_sys_id] = $row->total;
		}

		$data['content'] = $this->hds_output('dev_work/main_dev_work', $data_content, true);

		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);

	}

	public function approve($sys_id = 10, $all=FALSE)
	{
		include('dev_work_part/approve.php');
		return $view;
	}

	//Function pending for view page.
	public function pending($sys_id = 10, $all=FALSE)
	{
		include ('dev_work_part/pending.php');
		return $view;
	}

	public function ongoing($sys_id = 10, $all=FALSE){
		include('dev_work_part/ongoing.php');
		return $view;
	}

	//Function update status in view page.
	public function update_pending($rq_id, $sys_id, $rq_st_id)
	{
		include ('dev_work_part/update_pending.php');
	}

	
	public function update_ongoing($rq_id,$st_id,$sys_id){
		include('dev_work_part/update_ongoing.php');
	}
	public function update_approve($rq_id,$st_id,$sys_id){
		include('dev_work_part/update_approve.php');
	}
}