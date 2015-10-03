<?php
	//echo "test";
	$data['rq_subject'] = $this->input->post('rq_subject');
	$data['rq_tell'] = $this->input->post('rq_tell');
	$data['rq_ct_id'] = $this->input->post('ct_id');
	$data['rq_kn_id'] = $this->input->post('kn_id');
	$data['rq_email'] = $this->input->post('rq_email');
	$data['rq_sys_id'] = $this->input->post('StID');
	$data['rq_comp_id'] = $this->input->post('dpID');
	$data['rq_detail'] = $this->input->post('rq_detail');
	
	$data_level['lg_lv_id'] = $this->input->post('lv_id');
	//$data_level['lg_exp'] = $this->input->post('lg_exp');
	
	$lg_id = $this->input->post('lg_id');
	$rq_id = $this->input->post('rq_id');
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