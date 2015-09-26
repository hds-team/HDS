<?php
	
	$data['lv_name'] = $this->input->post('category');
	$data['lv_status'] = 1;

	$this->m_dynamic->insert('hds_category', $data);
	redirect(base_url('index.php/HDS/fundamental/category'));
?>