<?php
	$this->load->model($this->hds_part.'/fundamentnal/kind/m_kind');
	$data['get_kind'] = $this->m_kind->get_kind();
	$view = $this->hds_output('fundamental/kind/v_kind', $data, true);
?>