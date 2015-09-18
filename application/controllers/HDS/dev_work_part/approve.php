<?php
	$this->load->model('HDS/dev_work/approve/m_approve');

	//------- Check show all
	if($all){
		$data['approve'] = $this->m_approve->get_report_all(); //show all
	}
	else
	{
		$data['approve'] = $this->m_approve->get_report($sys_id); //show only one system
	}
	
	$data['approve'] = $this->m_approve->get_report($sys_id);
	$data['sys_id'] = $sys_id;
	$view = $this->hds_output('dev_work/approve/v_approve', $data, true);
?>