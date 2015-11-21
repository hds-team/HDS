<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Stats extends HDS_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->model($this->hds_part.'/stat_part/m_stat_tor');
		$this->load->model($this->hds_part.'/stat_part/m_stat_chart');
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

	public function bar_chart(){
		$this->benchmark->mark('code_start');
		include('stat_part/c_bar_chart.php');
		$data['content'] = $view;
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
	}

	public function get_stat_chart($table_main = "", $key_main = "", $key_rq = "", $system = "", $from = "", $to = ""){
		include('stat_part/c_get_stat_chart.php');
	}

	public function update_date_tor($rq_id, $date){
		include('stat_part/c_update_date_tor.php');
	}

	public function get_tor_contract($ctr_tp_id){
		include('stat_part/c_get_tor_contract.php');
	}

	public function update_tor($rq_id, $ctr_id){
		include('stat_part/c_update_tor.php');
	}

	public function check_tor($rq_id){
		include('stat_part/c_check_tor.php');
	}

	public function default_tor($rq_id){
		include('stat_part/c_tor_default.php');
	}

	public function get_drilldown($where_str, $group_by, $name, $from, $to){
		include('stat_part/c_get_drilldown.php');
	}

}

