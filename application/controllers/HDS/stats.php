<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Stats extends HDS_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->model($this->hds_part.'/stat_part/m_stat_tor');
	}

	public function getall_stat_tor()
	{
		$this->benchmark->mark('code_start');
		include('stat_part/stat_tor.php');
		$data['content'] = $view;
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
	}
	
	public function export_pdf(){
		//$this->benchmark->mark('code_start');
		include('stat_part/stat_pdf.php');
		//$data['content'] = $view;
		//$this->benchmark->mark('code_end');
		//$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		//$this->layout_output($data);
	}
}

