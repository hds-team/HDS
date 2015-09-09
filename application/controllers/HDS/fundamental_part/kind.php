<?php
	$data['get_kind'] = $this->m_dynamic->get_all('hds_kind');
	$view = $this->hds_output("fundamental/kind/v_kind", $data, true);
?>