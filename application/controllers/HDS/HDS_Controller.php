<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class HDS_Controller extends UMS_Controller 
{
	public $hds_part;
	public $ums_part;

	public function __construct(){
		parent::__construct();
		$this->load->model('HDS/m_dynamic');
		$this->load->library('date_time');
		//----- CONFIG
		$this->load->config('hds_config');
		$this->load->config('config');
		$this->hds_part = $this->config->item('sys_name');
		$this->ums_part = $this->config->item('UMS');
	}

	public function index()
	{
	}

	public function hds_output($file="System_name/welcome", $data=NULL, $no_display=false)
	{
		//$this->benchmark->mark('code_start');
		$file = "/".$this->hds_part."/".$file;
		//$this->benchmark->mark('code_end');
		//$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		return $this->load->view($file, $data, $no_display);
	}

	public function layout_output($data=NULL)//time to process
	{
		$this->output('/'.$this->hds_part.'/menu/layout', $data, true);
	}

	public function save_log($al_st_id, $at_rq_id){
		$data['al_st_id'] = $al_st_id;
		$data['al_date'] = date('Y-m-d');
		$data['al_time'] = date('H:i:s');
		$data['al_mb_id'] = $this->session->userdata('UsID');
		$data['al_rq_id'] = $at_rq_id;
		$this->m_dynamic->insert('hds_accept_log', $data);
	}

	public function check_user(){
		/*
		$this->load->model($this->hds_part.'/reply/m_reply');
		$query = $this->m_reply->actor_check($this->session->userdata('UsID'));
		$result = $query->row_array();
		*/
		//switch($result['GpID']){
		//echo "<BR> GpID : ".$this->session->userdata('GpID')."<BR>";
		switch($this->session->userdata('GpID')){
			case $this->config->item('user_id')		: 	redirect($this->hds_part.'/report/user_report');
														break;
			case $this->config->item('dev_id')		:	redirect($this->hds_part.'/dev_work');
														break;
			case $this->config->item('co_op_id')	:	redirect($this->hds_part.'/screening');
														break;
		}
	}

	public function array_convert($query, $index, $value)
	{
		$arr = array();
		foreach($query->result_array() as $row){
			$arr[$row[$index]] = $row[$value];
		}
		return $arr;
	}

	public function array_convert_chart($query, $index, $value, $id)
	{
		$arr = array();
		foreach($query->result_array() as $row){
			$arr[$row[$index]] = $row[$value];
			$arr['id'] = $row[$id];
		}
		return $arr;
	}

}
