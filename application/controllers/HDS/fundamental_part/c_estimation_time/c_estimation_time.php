<?php
	//echo "test";
	
	$this->load->model('HDS/fundamentnal/estimation_time/m_estimation_time');
	$data['query'] = $this->m_estimation_time->get_contract();
	
	//echo "test";
	$view = $this->hds_output('fundamental/estimation_time/v_estimation_time', $data);
?>