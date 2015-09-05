<?php
	//------ LOAD MODEL
	$rp_mb_id = $this->session->userdata('UsID');
	//echo $data['UsID'];
	$this->load->model('HDS/reply/m_reply');
	//------ GET DATA CHAT
	$mb_id = $this->session->userdata('UsID');
	$result = $this->m_dynamic->get_by_id('hds_position', 'ps_mb_id', $mb_id); // get status of member
	$row_status = $result->row_array();
	$data['status'] = $row_status['ps_ut_id']; // assign to status
	$data['chat'] = $this->m_reply->get_chat($rq_id, $data['status']); // pass rq_id and status
	//------ END GET DATA CHAT

	$data['rq_id'] = $rq_id;
	$data['request'] = $this->m_reply->get_request($rq_id);
	$data['file'] = $this->m_dynamic->get_by_id('hds_file', 'fl_rq_id',$rq_id);
	$data['reply'] = $this->m_dynamic->get_by_id('hds_reply', 'rp_rq_id',$rq_id);
	$data['content'] = $this->hds_output('reply/v_reply',$data,TRUE);
?>