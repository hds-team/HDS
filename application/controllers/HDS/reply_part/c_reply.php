<?php
	//------ LOAD MODEL
	$rp_mb_id = $this->session->userdata('UsID');
	//echo $data['UsID'];
	$this->load->model('HDS/reply/m_reply');
	$data['rq_id'] = $rq_id;
	$data['request'] = $this->m_reply->get_request($rq_id);
	$data['content'] = $this->hds_output('reply/v_reply',$data,TRUE);
?>