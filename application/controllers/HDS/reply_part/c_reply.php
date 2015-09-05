<?php
	$rp_mb_id = $this->session->userdata('UsID');
	//echo $data['UsID'];
	$this->load->model('HDS/reply/m_reply');
	$data['request'] = $this->m_reply->get_request($rq_id);
	$data['file'] = $this->m_dynamic->get_by_id('hds_file', 'fl_rq_id',$rq_id);
	$data['reply'] = $this->m_dynamic->get_by_id('hds_reply', 'rp_rq_id',$rq_id);
	/*
	$data['message_user'] = $this->m_dynamic->get_by_id('hds_reply', 'rp_rq_id',$rq_id); //message user
	$data['message_me'] = $this->m_dynamic->get_by_id('hds_reply', 'rp_rq_id',$rp_mb_id); //message member
	*/
	$data['content'] = $this->hds_output('reply/v_reply',$data,TRUE);
?>