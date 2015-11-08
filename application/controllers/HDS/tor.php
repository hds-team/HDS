<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Tor extends HDS_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->model($this->hds_part."/tor/m_tor");
	}

	public function index()
	{ 
		$data['query'] = $this->m_tor->tor_open()->result_array();
		$data['content'] = $this->hds_output("tor/v_tor", $data, true);
		$this->layout_output($data);
	}
	public function ins_tor()
	{ 
		$data['query'] = $this->m_tor->show_system()->result_array();
		$year = date("Y");
		$data['year'] = 543 +($year - 5);
		/*for($i= $year; $i <= $year + 10 ; $i++)
		{
			$data['year'] = $i; 
		} */
		$data['content'] = $this->hds_output("tor/ins_tor", $data, true);
		$this->layout_output($data);
	}
 	public function insert_tor()
	{
		$tp_name = $this->input->post("namekong");
		$tp_year = $this->input->post("year");
		$ts_sys_id = array();
		$ts_sys_id = $this->input->post("sys");
		
		$this->m_tor->tp_name = $tp_name;
		$this->m_tor->tp_year = $tp_year;
		
		$dayf = explode("/",$this->input->post('dayf'));
		$this->m_tor->tp_date_start = $dayf[2]."-".$dayf[1]."-".$dayf[0];
		
		$dayend = explode("/",$this->input->post('dayend'));
		$this->m_tor->tp_date_stop = $dayend[2]."-".$dayend[1]."-".$dayend[0];

		$this->m_tor->ins_hds_tor_proj();
		
		/////////////
		//$this->m_tor->ts_sys_id = $ts_sys_id;
		$data['query'] = $this->m_tor->show_max_ts_id()->result_array();
		foreach($data['query'] as $key => $max)
		{
			$ts_tp_id = $max['ts_max'];
			$this->m_tor->ctr_tp_id = $max['ts_max'];
		}
		 foreach($ts_sys_id as $key => $va)
		{
			$this->m_tor->ts_tp_id = $ts_tp_id;
			//echo $ts_tp_id."<br>";
			$this->m_tor->ts_sys_id = $ts_sys_id[$key];
			//echo $ts_sys_id[$key]."<br>";
			$this->m_tor->ins_hds_tor_system(); 
		} 
		//$this->m_tor->ins_hds_tor_system(); 
		////////////
		$ctr_number = array();
		$ctr_number = $this->input->post("ctr_number");
		$ctr_value = array();
		$ctr_value = $this->input->post("ctr_value");
		
		foreach($ctr_number as $key => $value)
		{
			$this->m_tor->ctr_number = $ctr_number[$key];
			$this->m_tor->ctr_value = $ctr_value[$key];
			
			$this->m_tor->ins_hds_contract(); 
		}
/* 		$ctr_value = $this->input->post("ctr_value");
		foreach($ctr_value as $key => $value2)
		{
			$this->m_tor->ctr_value = $value2;
		} */
		redirect($this->config->item('sys_name').'/tor/' );
		 
	} 
	public function insert_tree_tor()
	{
		$data['query'] = $this->m_dynamic->get_all('hds_contract');
		
		$data['content'] = $this->hds_output("tor/tree_tor", $data, true);
		$this->layout_output($data);		
	}
	public function show_edit_tor($tp_id)
	{
		$this->m_tor->tp_id = $tp_id;
		$this->m_tor->ts_tp_id = $tp_id;
		$this->m_tor->ctr_tp_id = $tp_id;
		
		/* $this->m_tor->show_tor_edit_system();
		$this->m_tor->show_tor_edit_pro(); */
		
		$data['pro'] = $this->m_tor->show_tor_edit_pro()->result_array();

		$year = date("Y");
		$data['year'] = 543 +($year - 5);
		
		$data['system'] = $this->m_tor->show_system()->result_array();
		$data['system2'] = $this->m_tor->show_tor_edit_system()->result_array();
		$data['contract_limit1'] = $this->m_tor->show_hds_contract_limit1()->result_array();
		$data['contract'] = $this->m_tor->show_hds_contract()->result_array();
		$data['num_row'] = $this->m_tor->show_hds_contract()->num_rows();
		echo $data['num_row'];
		
		$data['content'] = $this->hds_output("tor/edi_tor", $data, true);
		$this->layout_output($data);
	}
	public function edit_tor()
	{
		echo "coming"."<br>";
		$tp_id = $this->input->post("tp_id");
		$tp_name = $this->input->post("namekong");
		$tp_year = $this->input->post("year");
		//$ts_sys_id = $this->input->post("sys");
		
		$this->m_tor->tp_id = $tp_id;
		$this->m_tor->tp_name = $tp_name;
		$this->m_tor->tp_year = $tp_year;

		$dayf = explode("/",$this->input->post('dayf'));
		$this->m_tor->tp_date_start = $dayf[2]."-".$dayf[1]."-".$dayf[0];
		
		$dayend = explode("/",$this->input->post('dayend'));
		$this->m_tor->tp_date_stop = $dayend[2]."-".$dayend[1]."-".$dayend[0]; 
		
		echo $tp_id."<br>";
		echo $tp_name."<br>";
		echo $tp_year."<br>";
		echo $dayf[2]."-".$dayf[1]."-".$dayf[0]."<br>";
		echo $dayend[2]."-".$dayend[1]."-".$dayend[0]."<br>";

		//$this->m_tor->update_proj();
		
		/////////////
		$ts_tp_id = $this->input->post("tp_id");
		$this->m_tor->ts_tp_id = $ts_tp_id;
		$this->m_tor->delete_sys(); 
	
		$ts_sys_id = array();
		$ts_sys_id = $this->input->post("sys");
		print_r($ts_sys_id);
	
		foreach($ts_sys_id as $key => $va)
		{
			$this->m_tor->ts_tp_id = $ts_tp_id;
			//echo $ts_tp_id."<br>";
			$this->m_tor->ts_sys_id = $ts_sys_id[$key];
			//echo $ts_sys_id[$key]."<br>";ts_sys_id
			$this->m_tor->ins_hds_tor_system(); 
		} 
		//$this->m_tor->ins_hds_tor_system(); 
		////////////
		$ctr_tp_id = $this->input->post("tp_id");
		$this->m_tor->ctr_tp_id = $ctr_tp_id;
		$this->m_tor->delete_cont(); 
		
		$ctr_number = array();
		$ctr_number = $this->input->post("ctr_number");
		$ctr_value = array();
		$ctr_value = $this->input->post("ctr_value");
		
		foreach($ctr_number as $key => $value)
		{
			$this->m_tor->ctr_number = $ctr_number[$key];
			$this->m_tor->ctr_value = $ctr_value[$key];
			
			$this->m_tor->ins_hds_contract();  
		}
		redirect($this->config->item('sys_name').'/tor/' );
	}
	public function delete_tor($tp_id)
	{
		$this->m_tor->tp_id = $tp_id;
		$this->m_tor->delete_proj();
		
		$this->m_tor->ts_tp_id  = $tp_id;
		$this->m_tor->delete_sys(); 
		
		$this->m_tor->ctr_tp_id = $tp_id; 
		$this->m_tor->delete_cont(); 
		
		redirect($this->config->item('sys_name').'/tor/' );
	}
}

