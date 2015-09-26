<?php
	$this->load->model('HDS/fundamentnal/level/m_level');
	$data['query'] = $this->m_level->get_level();
	$view = $this->hds_output('fundamental/level/v_level', $data, true);
	
?>