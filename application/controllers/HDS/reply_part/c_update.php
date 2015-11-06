<?php
	if($this->input->post('rq_est_date') != NULL){
		//covert format date mm/dd/yy to yyy-mm-dd
		$est_date = explode("/",$this->input->post('rq_est_date'));
		$data['rq_est_date'] = $est_date[2]."-".$est_date[1]."-".$est_date[0];
	}else{
		$data['rq_est_date'] = NULL;
	}

	//-------- Get data from view
	$data['rq_subject'] = $this->input->post('rq_subject');
	$data['rq_ct_id'] = $this->input->post('ct_id');
	$data['rq_kn_id'] = $this->input->post('kn_id');
	$data['rq_sys_id'] = $this->input->post('StID');
	$data['rq_comp_id'] = $this->input->post('dpID');
	$data['rq_detail'] = $this->input->post('rq_detail');
	$data['rq_menu'] = $this->input->post('rq_menu');
	
	//-------- Get level 	
	$data_level['lg_lv_id'] = $this->input->post('lv_id');

	//-------- Get contact detail list
	$data_contact['ctl_ctt_id'] = array();
	$data_contact['ctl_value'] = array();
	$data_contact['ctl_ctt_id'] = $this->input->post('ctl_ctt_id');
	$data_contact['ctl_value'] = $this->input->post('ctl_value');

	//------- Delete all contact log by rq_id
	$rq_id = $this->input->post('rq_id');
	$this->m_reply->del_contact_by_id($rq_id);

	//------- Loop insert contact log
	$value_con['ctl_rq_id'] = $rq_id;

	foreach($data_contact['ctl_ctt_id'] as $key => $value)
	{
		$value_con['ctl_ctt_id'] = $value;
		$value_con['ctl_value'] = $data_contact['ctl_value'][$key];
		

		$this->m_dynamic->insert('hds_contact_log', $value_con);
	}

	//-------- Get date deadline	
	$lg_id = $this->input->post('lg_id');
	if($this->input->post('lg_exp') != NULL){
		//------- Convert format mm/dd/yy to yyyy-mm-dd
		$date_exp = explode("/",$this->input->post('lg_exp'));
		$data_level['lg_exp'] = $date_exp[2]."-".$date_exp[1]."-".$date_exp[0];

	}
	//------------------------------------
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
	$this->m_dynamic->update('hds_level_log','lg_id',$lg_id,$data_level);
	$system_name = $this->config->item('sys_name');	
	redirect($system_name.'/reply/detail_sys/'.$rq_id);
	
	//echo $data_level['lg_exp']."<br>";
?>