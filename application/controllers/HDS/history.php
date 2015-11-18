<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
//class My_class01 extends HDS_Controller{}
//class My_class01 extends HDS_Controller{}
class History extends HDS_Controller
{
	public function history_finish()
	{
		
		$this->benchmark->mark('code_start');
		//------------CODE
		
		include('history_part/history_finish.php');
	
		//------------END CODE
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		
		$this->layout_output($data);
	}
}