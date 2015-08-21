<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('UMS_Controller.php');
class AddTQF extends UMS_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('UMS/m_umuser');
		$this->load->model('UMS/m_umsystem');
		$this->load->model('UMS/m_umpermission');
		$this->load->model('UMS/m_ummenu');
		$this->load->model('UMS/m_umusergroup');
		$this->load->model('UMS/m_umgroup');
		$this->load->model('UMS/m_umwgroup');
		$this->load->model('UMS/m_umquestion');
	}
	public function index(){
		
		$this->output('UMS/v_addUser');
	}
	
	
	public function add(){
		
		$this->m_umuser->UsPsCode = $this->input->post('UsPsCode');
		$this->m_umuser->UsPassword = md5("O]O".$this->input->post('UsPassword')."O[O");
		$this->m_umuser->UsName = $this->input->post('UsName');
		$this->m_umuser->UsEmail = $this->input->post('UsEmail');
		$this->m_umuser->UsWgID = $this->input->post('UsWgID');
		$this->m_umuser->insert();
		$this->m_umusergroup->UgGpID = $this->input->post('GpID');
		$this->m_umusergroup->UgUsID = $this->m_umuser->get_ID_by_name();
		$this->m_umusergroup->insert();
		
		
		redirect('UMS/showUser', 'refresh');
	}
	
	
	
	
	
	
	
	
	

	
}
?>