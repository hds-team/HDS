<?php
	$data['query'] = $this->m_dynamic->get_all('hds_category');
	$view = $this->hds_output('fundamental/category/v_category', $data, true);
?>