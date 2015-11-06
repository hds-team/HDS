<?php
	//------ LOAD MODEL
	$this->load->model('HDS/reply/m_reply');

	$rp_mb_id = $this->session->userdata('UsID');
	//$data['actor'] = $this->actor_check($rp_mb_id);
	$data['actor'] = $this->session->userdata('GpID');
	//echo "REPLY";
	//echo $data['actor'];
	//------ Get Content Timeline
	if($data['actor'] == $this->config->item('user_id'))
	{
		//echo "USER";
		$data['user'] = $this->timeline(0, $rq_id);
	}
	else if($data['actor'] == $this->config->item('dev_id'))
	{
		//echo "DEV";
		$data['develope'] = $this->timeline(1, $rq_id);
	}
	else if($data['actor'] == $this->config->item('co_op_id'))
	{
		//echo "COOP";
		$data['user'] = $this->timeline(0, $rq_id);
		$data['develope'] = $this->timeline(1, $rq_id);
	}

	//------ Get type of contact
	$data['hds_contact_type'] = $this->m_dynamic->get_by_id('hds_contact_type', 'ctt_status', 1);

	//------ Get accept log
	$data['hds_accept_log'] = $this->m_reply->get_acceopt_log($rq_id);
	

	//------ Get detail of request
	$data['ct'] = $this->m_dynamic->get_all('hds_category');
	$data['kn'] = $this->m_dynamic->get_all('hds_kind');
	$data['lv'] = $this->m_dynamic->get_all('hds_level');
	$data['syst'] = $this->m_reply->get_system();
	$data['dep'] = $this->m_reply->get_department();
	$data['contact'] = $this->m_reply->get_contact($rq_id);
	$data['edit'] = $edit;
	$data['user_edite'] = $user;
	//echo $edit;
	$data['rq_id'] = $rq_id;
	$data['request'] = $this->m_reply->get_request($rq_id);
	$data['file'] = $this->m_reply->get_file($rq_id);
	$data['accept'] = $this->m_reply->get_accept_log($rq_id);
	//------ Get status to progress bar
	$data['status'] = $this->m_dynamic->get_all('hds_status');
	//------ Output view
	$data['content'] = $this->hds_output('reply/v_reply',$data,TRUE);
?>