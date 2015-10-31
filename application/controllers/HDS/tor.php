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
		$data['content'] = $this->hds_output("tor/v_tor", NULL, true);
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
		$ts_sys_id = $this->input->post("sys");
		
		$this->m_tor->tp_name = $tp_name;
		$this->m_tor->tp_year = $tp_year;

		$this->m_tor->ins_hds_tor_proj();
		
		$this->m_tor->ts_sys_id = $ts_sys_id;
		$data['query'] = $this->m_tor->show_max_ts_id()->result_array();
		foreach($data['query'] as $key => $max)
		{
			$this->m_tor->ts_tp_id = $max['ts_max'];
		}
		
		$this->m_tor->ins_hds_tor_system();
	} 
	public function insert_tree_tor()
	{
		$data['query'] = $this->m_dynamic->get_all('hds_contract');
		
		$data['content'] = $this->hds_output("tor/tree_tor", $data, true);
		$this->layout_output($data);
		
	}
}

