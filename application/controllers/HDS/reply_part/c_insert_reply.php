<?php
	$data['rp_mb_id'] = $this->session->userdata('UsID');
	$data['rp_detail'] = $this->input->post('rp_detail');
	$data['rp_rq_id'] = $this->input->post('rq_id');
	$data['rp_date'] = date("y-m-d");
	$data['rp_time'] = date("H-i-s");
	$this->m_dynamic->insert('hds_reply',$data);
	//echo $data['rp_detail'];
	//echo $data['rp_rq_id'];
	$rq_id = $data['rp_rq_id'];
	redirect('HDS/reply/detail_sys/'.$rq_id);
?>