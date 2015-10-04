<?php
	//-------- LOAD MODEL
	$this->load->model('HDS/report/m_report');


	//-------- Set data from post
	$data['rq_subject'] = $this->input->post('rq_subject');
	$data['rq_ct_id'] = $this->input->post('rq_ct_id');
	$data['rq_kn_id'] = $this->input->post('rq_kn_id');
	if($this->input->post('comp_id') == NULL)
	{	
		//echo" COMP NULL";
		$data['rq_comp_id'] = $this->session->userdata('UsDpID');
	}
	else
	{
		//echo" COMP NOT NULL";
		$data['rq_comp_id'] = $this->input->post('comp_id');
	}
	$data['rq_tell'] = $this->input->post('rq_tell');
	$data['rq_email'] = $this->input->post('rq_email');
	$data['rq_detail'] = $this->input->post('rq_detail');
	$data['rq_date'] = date('y-m-d');
	if($this->input->post('UsName') == NULL)
	{
		//echo" NAME NULL";
		$data['rq_mb_id'] = $this->session->userdata('UsID');
	}
	else
	{
		//echo" NAME NOT NULL";
		$result_UsID = $this->m_dynamic->get_by_id($this->ums_part.'.umuser', 'UsName', $this->input->post('UsName'));
		$UsID = $result_UsID->row_array();
		$data['rq_mb_id'] =  $UsID['UsID'];
	}
	$data['rq_mb_id'] = $this->session->userdata('UsID');
	$data['rq_sys_id'] = $this->input->post('sys_id');
	//-------- Check date exp
	if($this->input->post('lg_exp') != NULL){
		//------- Convert format mm/dd/yy to yyyy-mm-dd
		$date_exp = explode("/",$this->input->post('lg_exp'));
		$hds_level_log['lg_exp'] = $date_exp[2]."-".$date_exp[1]."-".$date_exp[0];

	}
	$hds_level_log['lg_lv_id'] = $this->input->post('lg_lv_id');
	$hds_level_log['lg_mb_id'] = $data['rq_mb_id'];
	//-------- Set URL Current
	$URL = $this->input->post('url'); 
	//-------- Check if null set to UMS 
	if($data['rq_sys_id'] == NULL)
	{
		$data['rq_sys_id'] = 10;
	}
	//-------- Set status default
	$data['rq_st_id'] = 1;
	//-------- Insert data to hds_request 
	$this->m_dynamic->insert('hds_request', $data);
	//-------- Get max id of hds_request
	$result = $this->m_report->get_max_rq_id(); //get max id of hds_request
	$row = $result->row_array();
	$max_rq_id = $row['rq_id'];
	//-------- Insert data to hds_level_log
	$hds_level_log['lg_rq_id'] = $max_rq_id;
	$this->m_dynamic->insert('hds_level_log', $hds_level_log);

	//-------- FILE insert data
	if($this->input->post('userfile') !== NULL)
	{
		//echo "UPLOAD CHECK";
		$data_file['fl_rq_id'] = $max_rq_id; // set max rq_id 
		
		//-------- Upload file
		$config['upload_path'] = $this->config->item('uploads_dir');
		$config['allowed_types'] = 'gif|jpg|png|rar|zip|doc|docx|xlsx|pdf|xls';
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			echo $error;
		}
		else
		{
			$upload_data =  $this->upload->data(); //Set info of file
			$data_file['fl_name'] = $upload_data['file_name']; //Set filename 
		}
		if($data_file['fl_name'] != NULL){
			$this->m_dynamic->insert('hds_file', $data_file); // insert filename to hds_file
		}
	}
	$part = explode("/",$URL);
	//redirect($part[3]."/".$part[4]."/".$part[5]);
	redirect('HDS/report/detail');

?>