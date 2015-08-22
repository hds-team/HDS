<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Dev_work extends HDS_Controller {
	public function index(){
		echo "Dev_work";
	}

	public function approve(){
		include('dev_work_part/approve.php');
	}

	public function pending(){
		include('dev_work_part/pending.php');
	}

	public function ongoing(){
		include('dev_work_part/ongoing.php');
	}

}