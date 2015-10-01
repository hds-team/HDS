<?php
	$data['rp_mb_id'] = $this->session->userdata('UsID'); //member login
	$data['rp_detail'] = $this->input->post('rp_detail'); //data text tera
	$data['rp_rq_id'] = $this->input->post('rq_id'); //id request
	$data['rp_msg_type'] = $this->input->post('rp_msg_type'); //id request
	$data['rp_date'] = date("y-m-d"); //date now
	$data['rp_time'] = date("H-i-s"); //time now
	$this->m_dynamic->insert('hds_reply',$data);
	//echo $data['rp_detail'];
	//echo $data['rp_rq_id'];
	$rq_id = $data['rp_rq_id'];
	if($data['rp_msg_type'] == 0){
		$tab = "#user";
	}
	else
	{
		$tab = "#develope";
	}
	redirect('HDS/reply/detail_sys/'.$rq_id.$tab);
?>