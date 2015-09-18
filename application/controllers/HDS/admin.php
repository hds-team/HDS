<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
//class My_class01 extends HDS_Controller{}
//class My_class01 extends HDS_Controller{}
class Admin extends HDS_Controller
{
	public function index()
	{
		echo "ADMIN";
	}

	public function position()
	{
		$this->benchmark->mark('code_start');
		include('admin_part/position.php');
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
	}
	
	public function update_member()
	{
		include('admin_part/update_member.php');
	}
}