<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Report extends HDS_Controller
 {
 	public $hds_part;
 	public $ums_part;

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('HDS/report/m_report');
 		$this->load->config('hds_config');
 		$this->hds_part = $this->config->item('sys_name');
 		$this->ums_part = $this->config->item('UMS');
 	}
	public function user_report()
	{
		include('report_part/user_report.php');
		$this->layout_output($data);
	}



	public function insert()
	{ 
		include('report_part/insert.php');
	}


	public function detail()
	{
		$this->benchmark->mark('code_start');
		include('report_part/detail.php');
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
	}

}
