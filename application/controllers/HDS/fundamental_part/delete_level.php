<?php
	
	$this->m_dynamic->delete('hds_category', 'lv_id', $lv_id);
	redirect(base_url('index.php/HDS/fundamental/category'));
?>