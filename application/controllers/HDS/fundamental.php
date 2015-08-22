<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Fundamental extends HDS_Controller {
	public function index(){
		echo "Fundamental";
	}

	public function kind(){
		include('fundamental_part/kind.php');
	}

	public function category(){
		include('fundamental_part/category.php');
	}

	public function level(){
		include('fundamental_part/level.php');
	}
}