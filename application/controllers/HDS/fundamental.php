<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Fundamental extends HDS_Controller {
	public function index()
	{
		echo "Fundamental";
	}

	public function kind()
	{
		$this->benchmark->mark('code_start');
		include('fundamental_part/kind.php');
		$data['content'] = $view;
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
	}

	public function category()
	{
		$this->benchmark->mark('code_start');
		include('fundamental_part/category.php');
		$data['content'] = $view;
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
	}

	public function contact()
	{
		$this->benchmark->mark('code_start');
		include('fundamental_part/contact.php');
		$data['content'] = $view;
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
	}
	public function insert_category()
	{
		include('fundamental_part/insert_category.php');

		//$data['content'] = $view;
		//$this->layout_output($data);
	}
	
	public function level()
	{
		$this->benchmark->mark('code_start');
		include('fundamental_part/level.php');
		$data['content'] = $view;
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
	}
	
	public function insert_kind()
	{
		include('fundamental_part/insert_kind.php');
	}
	public function delete_kind($kn_id)
	{
		include('fundamental_part/delete_kind.php');
	}
	public function update_kind()
	{
		include('fundamental_part/update_kind.php');
	}
	public function update_status_kind($kn_id, $kn_status)
	{
		include('fundamental_part/update_status_kind.php');
	}
	
	public function update_status_category($ct_id,$ct_status)
	{
		include('fundamental_part/update_status_category.php');
	}
	public function update_status_level($lv_id,$lv_status)
	{
		include('fundamental_part/update_status_level.php');
	}
	public function update_category()
	{
		include('fundamental_part/update_category.php');
	}
	public function delete_category($ct_id)
	{
		include('fundamental_part/delete_category.php');
	}
	public function insert_level()
	{
		include('fundamental_part/insert_level.php');
	}
	public function update_level()
	{
		include('fundamental_part/update_level.php');
	}
	public function delete_level($lv_id)
	{
		include('fundamental_part/delete_level.php');
	}
	public function communcate()
	{
		
		$this->benchmark->mark('code_start');
		include('fundamental_part/communcate/c_communcate.php');
		$data['content'] = $view;
		$this->benchmark->mark('code_end');
		$this->session->set_userdata('time_cpu', $this->benchmark->elapsed_time('code_start', 'code_end'));
		$this->layout_output($data);
	}
	public function insert_communcate()
	{
		include('fundamental_part/communcate/c_insert_communcate.php');
	}
	public function update_communcate($ctt_id,$ctt_status)
	{
		include('fundamental_part/communcate/c_update_communcate.php');
	}
	public function delete_communcate($ctt_id)
	{
		include('fundamental_part/communcate/c_delete_communcate.php');
	}
	public function update_value_communcate()
	{
		include('fundamental_part/communcate/c_update_value_communcate.php');
	}
}