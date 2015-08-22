<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Screening extends HDS_Controller {
	public function index(){
		echo "Screening";
	}

	public function check(){
		include('screening_part/check.php');
	}

	public function check_now(){
		include('screening_part/check_now.php');
	}

	public function petition(){
		include('screening_part/petition.php');
	}
}