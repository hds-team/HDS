<?php
	//------ LOAD MODEL
	$this->load->model('HDS/reply/m_reply');
	$data['timeline_content'] = $this->m_reply->timeline($rp_msg_type, $rq_id);
	$data['rq_id'] = $rq_id;
	$data['rp_msg_type'] = $rp_msg_type;
	//$this->output('HDS/reply/v_timeline', $data);
	$view = $this->hds_output('/reply/v_timeline', $data, true);
?>