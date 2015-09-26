<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Screening extends HDS_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->model($this->hds_part.'/screening/m_screening');
		$this->load->model($this->hds_part.'/report/m_report');
	}

	public function index($sys_id=99)
	{
		$this->benchmark->mark('code_start');
		//echo "Screening";
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
			$data_content['system_select'] = $data['system']; //set for select in dropdown curreny system

			if($data['system'] == 99)
			{
				$all = TRUE; // Show all systems
			}else{
				$all = FALSE;
			}
			$data_content['check'] = $this->check($data['system'], $all);
			$data_content['check_now'] = $this->check_now($data['system'], $all);
			$data_content['petition'] = $this->petition($data['system'], $all);

		}

		$data_content['system'] = $this->m_dynamic->get_all('ums.umsystem');

		foreach($this->m_screening->notification()->result() as $row){
			$data_content['system_notification'][$row->rq_sys_id] = $row->total;
		}
		
		//------- HDS REPORT FORM
		$data_content['hds_category'] = $this->m_report->get_category();
		$data_content['hds_kind'] = $this->m_report->get_kind();
		$data_content['hds_level'] = $this->m_report->get_level();
		$data_content['hds_system'] = $data_content['system'];
		$data_content['hds_comp'] = $this->m_dynamic->get_all('ums.umdepartment');
		$data_content['hds_member'] = $this->m_dynamic->get_all('ums.umuser');
		//------- END HDS REPORT

		$data['content'] = $this->hds_output('screening/main_screening', $data_content, true);

		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		
		$this->layout_output($data);
	}

	//-------- Get request by system
	public function check($sys_id=10, $all=FALSE)
	{ //get content by system id
		include('screening_part/check.php');
		return $view;
	}

	public function check_now($sys_id= 10, $all=FALSE)
	{ //get content by system id
		include('screening_part/check_now.php');
		return $view;
	}

	public function petition($sys_id=10, $all=FALSE)
	{ //get content by system id
		include('screening_part/petition.php');
		return $view; 
	}

	public function update_check($rq_id,$st_id,$sys_id)
	{
		include('screening_part/update_check.php');
	}
	public function update_petition_accect($rq_id,$st_id,$sys_id)
	{
		include('screening_part/update_petition_accept.php');
	}
	public function update_petition_complete($rq_id,$st_id,$sys_id)
	{
		include('screening_part/update_petition_complete.php');
	}
	
}

