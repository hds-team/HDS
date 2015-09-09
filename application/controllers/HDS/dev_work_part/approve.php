<?php
	$this->load->model('HDS/dev_work/approve/m_approve');
	$data['approve'] = $this->m_approve->get_report();
	$view = $this->hds_output('dev_work/approve/v_approve', $data, true);
?>