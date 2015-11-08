<?php
	/*
	date edit: 8/11/2015
	create: santisuk kamlangyong
	id: 56160416
	tel: 0814527114
	facebook: Modnoiizz Crazie
	email: mod_2660@hotmail.com
	*/
	$data['rq_st_id'] = 6;
	$accept['al_st_id'] = 6;
	$accept['al_date'] = date('y-m-d');
	$accept['al_time'] = date('h:i:s');
	$accept['al_rq_id'] = $rq_id;
	$accept['al_mb_id'] = $this->session->userdata('UsID');
	$system_name = $this->config->item('sys_name');	
	
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
	$this->m_dynamic->insert('hds_accept_log',$accept);
	redirect('HDS/HDS_Controller/check_user');
	
	//echo $data_level['lg_exp']."<br>";
?>