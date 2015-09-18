<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Report extends HDS_Controller
 {
	public function index()
	{

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
