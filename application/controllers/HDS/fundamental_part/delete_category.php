<?php
	
	$this->m_dynamic->delete('hds_category', 'ct_id', $ct_id);
	redirect(base_url('index.php/HDS/fundamental/category'));
?>