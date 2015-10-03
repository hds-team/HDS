<?php
	//echo "test";
	$data['rq_subject'] = $this->input->post('rq_subject');
	$data['rq_tell'] = $this->input->post('rq_tell');
	$data['rq_ct_id'] = $this->input->post('ct_id');
	$data['rq_email'] = $this->input->post('rq_email');
	$data['rq_sys_id'] = $this->input->post('StID');
	$data['rq_date'] = $this->input->post('rq_date');
	$data['rq_comp_id'] = $this->input->post('dpID');
	$data['rq_detail'] = $this->input->post('rq_detail');
	
	$data['lg_lv_id'] = $this->input->post('lv_id');
	$data['lg_exp'] = $this->input->post('lg_exp');
	
	$data['lg_id'] = $this->input->post('lg_id');
	$data['rq_id'] = $this->input->post('rq_id');
	//------------------------------------
	//echo $data['rq_subject']."<br>";
	//echo $data['rq_tell']."<br>";
	echo $data['rq_ct_id']."<br>";
	//echo $data['rq_email']."<br>";
	//echo $data['rq_date']."<br>";
	echo $data['rq_comp_id']."<br>";
	//echo $data['rq_detail']."<br>";
	
	echo $data['lg_lv_id']."<br>";
	//echo $data['lg_exp']."<br>";
	
	//echo $data['lg_id']."<br>";
	//echo $data['rq_id']."<br>";
	
?>