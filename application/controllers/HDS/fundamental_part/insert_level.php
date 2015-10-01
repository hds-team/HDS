<?php
	
	$data['lv_name'] = $this->input->post('level');
	$data['lv_status'] = 1;

	$this->m_dynamic->insert('hds_level', $data);
	redirect(base_url('index.php/HDS/fundamental/level'));
?>