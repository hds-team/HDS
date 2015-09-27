<?php
	$this->load->model('HDS/history/m_history');
	//------- Check show all
	$this->session->userdata('UsID'); //show all
	$data['query'] = $this->m_history->get_request(); //show only one system

	//---------- LOAD VIEW
	$data['content'] = $this->hds_output("history/history_finish", $data, True);
?>