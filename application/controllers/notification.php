<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('UMS_Controller.php');
class Notification extends UMS_Controller{

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('UMS/m_umuser');
		$this->load->model('UMS/m_umusergroup');
		$this->load->model('UMS/m_umsystem');
		$this->load->model('UMS/m_umlog');
		$this->load->model("UMS/m_umnotification");
		$this->load->model("UMS/m_umgroup");
	}
	public function index()
	{
		$data['notice'] = $this->m_umnotification->get_all_with_sys()->result_array();
		$this->output('template/notification',$data);
	}
	function sendURL($NotifyID)
	{
		$ID = str_replace("_","/",$NotifyID);
		$ID = str_replace(":","+",$ID);
		$ID = str_replace("~","=",$ID);
		$NotifyID = $this->encrypt->decode($ID);
		$this->m_umnotification->read($NotifyID);
		$notice = $this->m_umnotification->get_url($NotifyID)->row_array();
		$this->session->set_userdata('GpID',$notice['no_wgid']);
		$this->session->set_userdata('StID',$notice['system_id']);
		
		// logging 
		$GpName=$this->m_umgroup->get_name($notice['no_wgid']);
		$Sys=$this->m_umsystem->get_sys($notice['system_id']);
		$this->session->set_userdata('HOME',$Sys['StURL']);
		$this->session->set_userdata('SysName',$Sys['StAbbrE']);
		$this->m_umlog->getgear($GpName,$Sys['StNameT']);
		redirect($notice['link'],'refresh'); 
	}
	function removeNotice($NotifyID)
	{
		$this->m_umnotification->remove($NotifyID);
		redirect('notification','refresh'); 
	}
} 
?>