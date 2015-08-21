<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('UMS_Controller.php');
class ShowReport extends UMS_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UMS/m_umlog','');
		$this->load->model("UMS/m_umuser");
		$this->load->model("UMS/m_umsystem");
	}
	public function index()
	{
		$data['log'] = $this->m_umlog->get_by_ID();
		$this->output('UMS/v_showMyLog',$data);
	}
	public function setTime()
	{
		$data['TimeFrom'] = $this->input->post('TimeFrom');
		$data['TimeTo'] = $this->input->post('TimeTo');
		$data['log'] = $this->m_umlog->get_time_between($data['TimeFrom'],$data['TimeTo']);
		$this->output('UMS/v_showMyLog_set_time',$data);
	}
	
	public function reportUser(){
		$data['count'] = $this->m_umlog->get_count()->result_array();
		foreach($data['count'] as $count){
			$data['many'] = $count['many'];
		}
		$data['system'] = $this->m_umsystem->get_sys_count()->result_array();
		/*foreach($data['system'] as $system){
			echo $system['StNameT']."  ".$system['num']."<br />";
		}*/
		$this->output('UMS/v_reportUser',$data);
	}
	
	public function reportSystem($StID){
		$this->m_umsystem->StID = $StID;
		$data['system'] = $this->m_umsystem->get_group_system()->result_array();
		$data['sysname'] = $this->m_umsystem->get_by_key_sys()->result_array();
		foreach($data['system'] as $sysname){
			$systemname = $sysname['StNameT'];
		}
		$c = strlen($systemname);
		$lengthsystem = 0;
		for ($i = 0; $i < $c; ++$i){
			if ((ord($systemname[$i]) & 0xC0) != 0x80){
            ++$lengthsystem;
			}
      }
		$data['length'] = $lengthsystem;
		$data['lengthstr'] = strlen($systemname);
		$data['log'] = $this->m_umlog->get_log_action_report($systemname)->result_array();
		$this->output('UMS/v_reportSystem',$data);
	}
	
	public function reportGroup($GpID){
		$this->m_umsystem->GpID = $GpID;
		$data['group'] = $this->m_umsystem->get_user_group()->result_array();
		$this->output('UMS/v_reportGroup',$data);
	}
} 
?>