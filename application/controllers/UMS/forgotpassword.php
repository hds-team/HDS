<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('NoLogin_Controller.php');
class Forgotpassword extends NoLogin_Controller {

	// Create __construct for load model use in this controller
	public function __construct(){
		//call parent::__construct() for use $this->load
		parent::__construct();
		$this->load->model('UMS/m_umforgotpassword');
		$this->load->model('UMS/m_umuser');

	}
	
	public function index(){
	$data['OK'] = 0;
	$data['forgotpassword'] = $this->m_umforgotpassword->get_all();  
	//Output!
		$this->output('UMS/v_forgotpassword',$data);
	}
	
	
	
	public  function forgotpassword(){
	//sent   to  e-mail
		//$data['forgotpassword'] = $this-m_umforgotpasword->check_user();
		//$data['forgotpassword'] = $this-m_umforgotpasword-> check_email();
		$this->load->library('email');
		$this->email->from('s54160343@buu.ac.th', 'UMS');
		$this->email->to('gifjee-iam@hotmail.com');
		$this->email->cc('s54160343@buu.ac.th');
		$this->email->bcc('gifjee-iam@windowslive.com');
		$this->email->subject('Email Test Message');
		$this->email->message('Testing the email class.');
		$this->email->send();
		echo $this->email->print_debugger();
				
				
		$this->load->view('UMS/v_forgotpassword',$data);

	}
	
	
	
	
	
}