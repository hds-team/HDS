<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Report extends HDS_Controller
 {
	public function index()
	{

	}

	public function insert()
	{ 
		include('report_part/insert.php');
	}


	public function detail()
	{
		include('report_part/detail.php');
	}

}
