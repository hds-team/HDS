<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Fundamental extends HDS_Controller {
	public function index(){
		echo "Fundamental";
	}

	public function kind(){
		include('fundamental_part/kind.php');
		
		$data['content'] = $view;
		$this->layout_output($data);
	}

	public function category(){
		include('fundamental_part/category.php');

		$data['content'] = $view;
		$this->layout_output($data);
	}

	public function contact(){
		include('fundamental_part/contact.php');
		
	
		$data['content'] = $view;
		$this->layout_output($data);
	}
}