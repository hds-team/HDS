<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Reply extends HDS_Controller
{

	public function detail_sys($rq_id)
	{
		//echo "test";
		
		//$this->benchmark->mark('code_start');
		include('reply_part/c_reply.php');
		//$this->benchmark->mark('code_end');
		//$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
		
	}
	public function insert_reply()
	{
		include('reply_part/c_insert_reply.php');
	}
}