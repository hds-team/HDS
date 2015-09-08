<?php
	$this->load->model('/HDS/screening/check_now/m_check_now');
	$data['query'] = $this->m_check_now->check_now_require($sys_id);
	$view = $this->hds_output('screening/check_now/v_check_now', $data, TRUE);
?>