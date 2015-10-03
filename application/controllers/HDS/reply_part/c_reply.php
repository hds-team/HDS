<?php
	//------ LOAD MODEL
	$this->load->model('HDS/reply/m_reply');

	$rp_mb_id = $this->session->userdata('UsID');
	$data['actor'] = $this->actor_check($rp_mb_id);
	//echo "REPLY";
	//echo $data['actor'];
	//------ Get Content Timeline
	if($data['actor'] == $this->config->item('user_id'))
	{
		//echo "USER";
		$data['user'] = $this->timline(0, $rq_id);
	}
	else if($data['actor'] == $this->config->item('dev_id'))
	{
		//echo "DEV";
		$data['develope'] = $this->timline(1, $rq_id);
	}
	else if($data['actor'] == $this->config->item('co_op_id'))
	{
		//echo "COOP";
		$data['user'] = $this->timline(0, $rq_id);
		$data['develope'] = $this->timline(1, $rq_id);
	}
	

	//------ Get detail of request
	$data['ct'] = $this->m_dynamic->get_all('hds_category');
	$data['lv'] = $this->m_dynamic->get_all('hds_level');
	$data['syst'] = $this->m_reply->get_system();
	$data['dep'] = $this->m_reply->get_department();
	$data['edit'] = $edit;
	//echo $edit;
	$data['rq_id'] = $rq_id;
	$data['request'] = $this->m_reply->get_request($rq_id);
	$data['file'] = $this->m_reply->get_file($rq_id);

	//------ Output view
	$data['content'] = $this->hds_output('reply/v_reply',$data,TRUE);
?>