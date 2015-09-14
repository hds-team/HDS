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
	public function insert_category(){
		include('fundamental_part/insert_category.php');

		//$data['content'] = $view;
		//$this->layout_output($data);
	}
	
	public function insert_kind(){
		include('fundamental_part/insert_kind.php');
	}
	public function delete_kind($kn_id){
		include('fundamental_part/delete_kind.php');
	}
	public function update_status_category($ct_id,$ct_status){
		include('fundamental_part/update_status_category.php');
	}
	public function update_category(){
		include('fundamental_part/update_category.php');
	}

}