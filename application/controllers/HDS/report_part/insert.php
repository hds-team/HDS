<?php
	$check_from_screening = false;
	//-------- LOAD MODEL
	$this->load->model('HDS/report/m_report');

	//-------- Set data from post
	$data['rq_subject'] = $this->input->post('rq_subject');
	$data['rq_ct_id'] = $this->input->post('rq_ct_id');
	$data['rq_kn_id'] = $this->input->post('rq_kn_id');
	$data['rq_menu'] = $this->input->post('rq_menu');	
	$data['rq_detail'] = $this->input->post('rq_detail');
	$data['rq_date'] = date('y-m-d');
	$data['rq_sys_id'] = $this->input->post('sys_id');


	//-------- Checl source of data
	if($this->input->post('comp_id') == NULL)
	{	
		//echo" COMP NULL";
		$data['rq_comp_id'] = $this->session->userdata('UsDpID'); //From user
	}
	else
	{
		//echo" COMP NOT NULL";
		$check_from_screening = true;
		$data['rq_comp_id'] = $this->input->post('comp_id');//From Coop
	}

	//-------- Check who send
	if($this->input->post('UsName') == NULL)
	{
		//echo" NAME NULL";
		$data['rq_mb_id'] = $this->session->userdata('UsID'); //From User
	}
	else
	{
		//echo" NAME NOT NULL";
		$result_UsID = $this->m_dynamic->get_by_id($this->ums_part.'.umuser', 'UsName', $this->input->post('UsName'));
		$UsID = $result_UsID->row_array();
		if($UsID['UsID'] == NULL)
		{
			$data['rq_mb_id'] = $this->session->userdata('UsID'); //From User
		}
		else
		{
			$data['rq_mb_id'] =  $UsID['UsID']; //From Coop
		}
		
		//echo $data['rq_mb_id'];
	}
	
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

	//-------- FILE insert data and Upload Multifile
	if($this->input->post('userfile') !== NULL)
	{
		//echo "UPLOAD CHECK";
		$data_file['fl_rq_id'] = $max_rq_id; // set max rq_id 
		//-------UPLOAD

		$count = 0;
		$name_array = array();
		$count = count($_FILES['userfile']['size']);
		foreach($_FILES as $key=>$value)
		{
			for($s=0; $s<=$count-1; $s++) 
			{
				$_FILES['userfile']['name']		= $value['name'][$s];
				$_FILES['userfile']['type']		= $value['type'][$s];
				$_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
				$_FILES['userfile']['error']    = $value['error'][$s];
				$_FILES['userfile']['size']		= $value['size'][$s];  

				$config['upload_path'] = $this->config->item('uploads_dir');
				$config['allowed_types'] = 'gif|jpg|png|rar|zip|doc|docx|xlsx|pdf|xls';

				
				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload())
				{
					$error = $this->upload->display_errors();
					echo $error;	
				}else{
					$upload_data =  $this->upload->data(); //Set info of file
					$data_file['fl_name'] = $upload_data['file_name']; //Set filename
					$this->m_dynamic->insert('hds_file', $data_file); // insert filename to hds_file
				}

			}
		}

	}

	//-------- insert contact
	$ctl_ctt_id = $this->input->post('ctl_ctt_id');
	$ctl_value = $this->input->post('ctl_value');
	
	$hds_contact_log['ctl_rq_id'] = $max_rq_id;

	foreach($ctl_ctt_id as $key => $value){
		$hds_contact_log['ctl_ctt_id'] = $value;
		$hds_contact_log['ctl_value'] = $ctl_value[$key];
		$this->m_dynamic->insert('hds_contact_log', $hds_contact_log);
	}

	//------- redirect
	if($check_from_screening)
	{
		//$part = explode("/",$URL);
		//redirect($part[3]."/".$part[4]."/".$part[5]);
		redirect($this->hds_part.'/screening');
	}
	else
	{
		redirect($this->hds_part.'/report/detail');
	}

?>