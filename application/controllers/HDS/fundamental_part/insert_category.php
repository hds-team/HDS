<?php
	
	$data['ct_name'] = $this->input->post('category');
	$data['ct_status'] = 1;

	$this->m_dynamic->insert('hds_category', $data);
	redirect(base_url('index.php/HDS/fundamental/category'));
?>