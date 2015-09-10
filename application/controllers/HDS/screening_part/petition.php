<?php
	$this->load->model('/HDS/screening/petition/m_petition','m_petition');
	$data['query'] = $this->m_petition->get_all($sys_id); 
	$data['sys_id'] = $sys_id;
	$view = $this->hds_output('screening/petition/v_petition', $data, true); 
?>