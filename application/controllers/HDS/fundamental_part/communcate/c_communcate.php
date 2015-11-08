<?php
	//echo "test";
	
	$this->load->model('HDS/fundamentnal/communcate/m_communcate');
	$data['query'] = $this->m_communcate->get_contract();
	
	//echo "test";
	$view = $this->hds_output('fundamental/communcate/v_communcate', $data,true);
?>