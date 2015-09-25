<?php
	$this->load->model('HDS/dev_work/approve/m_approve');

	//------- Check show all
	if($all){
		$data['approve'] = $this->m_approve->get_report_all($this->session->userdata('UsID')); //show all
		//$data['approve'] = $this->m_dev_work->get_request($this->session->userdata('UsID'));
	}
	else
	{
		$data['approve'] = $this->m_approve->get_report($sys_id); //show only one system
	}
	$data['sys_id'] = $sys_id;
	$view = $this->hds_output('dev_work/approve/v_approve', $data, true);
?>