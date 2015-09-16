<?php
	$this->load->model('HDS/fundamentnal/category/m_category');
	$data['query'] = $this->m_category->get_category();
	$view = $this->hds_output('fundamental/category/v_category', $data, true);
?>