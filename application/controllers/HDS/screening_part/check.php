﻿<?php
	$this->load->model($this->hds_part."/screening/check/m_check");

	//------- Check show all
	if($all){
		$data['query'] = $this->m_check->show_check_all()->result_array(); //show all
	}
	else
	{
		$data['query'] = $this->m_check->show_check($sys_id)->result_array();
	}

	/*
	foreach($data['query'] as $key => $ch)
	{	
			echo $ch['ct_name']."<br>";
	}
	*/
	$data['sys_id'] = $sys_id;
	$view = $this->hds_output("screening/check/v_check", $data,true);
?>