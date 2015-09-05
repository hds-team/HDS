<?php
	$mb_id = $this->session->userdata('UsID');

	$this->load->model('HDS/m_report');
	$data['list'] = $this->m_report->get_detail($mb_id);
	$this->output('/HDS/report/v_detail', $data, FALSE);
?>