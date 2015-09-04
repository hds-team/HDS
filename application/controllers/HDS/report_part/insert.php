<?php
	//-------- LOAD MODEL
	$this->load->model('HDS/report/m_report');
	//-------- Set data from post
	$data['rq_subject'] = $this->input->post('rq_subject');
	$data['rq_ct_id'] = $this->input->post('rq_ct_id');
	$data['rq_kn_id'] = $this->input->post('rq_kn_id');
	$data['rq_comp_id'] = $this->session->userdata('UsDpID');
	$data['rq_tell'] = $this->input->post('rq_tell');
	$data['rq_email'] = $this->input->post('rq_email');
	$data['rq_detail'] = $this->input->post('rq_detail');
	$data['rq_date'] = date('y-m-d');
	$data['rq_mb_id'] = $this->session->userdata('UsID');
	$data['rq_sys_id'] = $this->session->userdata('StID');
	//-------- Set URL Current
	$URL = $this->input->post('url'); 
	//-------- Check if null set to UMS 
	if($data['rq_sys_id'] == NULL){
		$data['rq_sys_id'] = 10;
	}
	//-------- Set status
	$data['rq_st_id'] = 1;
	//-------- Insert data to hds_request 
	$this->m_dynamic->insert('hds_request', $data);

	//-------- FILE insert data
	$result = $this->m_report->get_max_rq_id();
	$row = $result->row_array();

	$data_file['fl_rq_id'] = $row['rq_id']; // set max rq_id 
	
	//-------- Upload file
	$config['upload_path'] = '../uploads/';
	$config['allowed_types'] = 'gif|jpg|png';
	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload())
	{
		$error = $this->upload->display_errors();
		echo $error;
	}
	else
	{
		$upload_data =  $this->upload->data(); //Set info of file
		$data_file['fl_name'] = $upload_data['file_name']; //Set filename 
	}

	$this->m_dynamic->insert('hds_file', $data_file); // insert filename to hds_file
	redirect(base_url($URL));

?>