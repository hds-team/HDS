<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class HDS_Controller extends UMS_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->model('HDS/m_dynamic');
		$this->load->library('date_time');
		$this->config->load('hds_config');
	}

	public function index()
	{
	}

	public function hds_output($file="System_name/welcome", $data=NULL, $no_display=false)
	{
		//$this->benchmark->mark('code_start');
		$file = "/HDS/".$file;
		//$this->benchmark->mark('code_end');
		//$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		return $this->load->view($file, $data, $no_display);
	}

	public function layout_output($data=NULL)//time to process
	{
		$this->output('/HDS/menu/layout', $data, true);
	}

	public function save_log($al_st_id, $at_rq_id){
		$data['al_st_id'] = $al_st_id;
		$data['al_date'] = date('Y-m-d');
		$data['al_time'] = date('H:i:s');
		$data['al_mb_id'] = $this->session->userdata('UsID');
		$data['al_rq_id'] = $at_rq_id;
		$this->m_dynamic->insert('hds_accept_log', $data);
	}

}
