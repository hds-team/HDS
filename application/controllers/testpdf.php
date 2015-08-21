<?php
class Testpdf extends CI_Controller{	
	public function __construct()
	{ 
		parent::__construct();
	}
	public function index()
	{
		$this->load->library('mpdf');
		$this->mpdf->WriteHTML('<p>Hello There</p>');
		$this->mpdf->WriteHTML('<p>Hello There</p>');
		$this->mpdf->Output();
	}
}

?>