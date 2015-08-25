<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
//class My_class01 extends HDS_Controller{}
//class My_class01 extends HDS_Controller{}
class Admin extends HDS_Controller{
	public function index(){
		echo "ADMIN";
	}

	public function position(){
		include('admin_part/position.php');
	}
	// Comment
	//มด
	//kuy fifa
	// fifa kak
}