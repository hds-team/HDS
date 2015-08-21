<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main extends CI_Controller {
	public function index(){
		$this->load->view('template/header2');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_main');
		$this->load->view('template/footer');
		
		
	}
	
}
/*
class Table_g_conrol extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('table.php');
		
	}
	function quetion()
	{
		$this->load->view('question.php');
	}
	function showmenu()
	{
		$this->load->view('Showmenu.php');
	}
	function showservice()
	{
		$this->load->view('showservice.php');
	}
	
	
}*/
?>