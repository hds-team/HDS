<?php
	$this->load->model('/HDS/screening/petition/m_petition','natkamonnaksomphan');
	$data['query'] = $this->natkamonnaksomphan->get_all(); 
	$view = $this->hds_output('screening/petition/v_petition', NULL, true); 
?>