<?php
	$this->load->model('/HDS/screening/check_now/m_check_now');
	//------- Check show all
	if($all){
		$data['query'] = $this->m_check_now->check_now_require_all($sys_id); //show all
	}
	else
	{
		$data['query'] = $this->m_check_now->check_now_require($sys_id); //show only one system
	}

	$view = $this->hds_output('screening/check_now/v_check_now', $data, TRUE);
?>