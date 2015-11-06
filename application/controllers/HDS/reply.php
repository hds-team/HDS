<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Reply extends HDS_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->config('config');
		$this->load->config('hds_config');
		$this->load->model($this->config->item('sys_name').'/reply/m_reply');
	}
	public function detail_sys($rq_id, $edit=false, $user=false)
	{
		$this->benchmark->mark('code_start');
		include('reply_part/c_reply.php');
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
	}

	public function insert_reply()
	{
		include('reply_part/c_insert_reply.php');
	}

	public function download($fil_url) {
		include('reply_part/c_download.php');
	}

	public function actor_check($mb_id){
		include('reply_part/c_actor_check.php');
		return $value;
	}

	public function timeline($rp_msg_type, $rq_id){
		include('reply_part/c_timeline.php');
		return $view;
	}
	public function update_reply(){
		include('reply_part/c_update.php');
	}
	public function delete_reply($rq_id,$lg_id){
		include('reply_part/c_delete.php');
	}
}