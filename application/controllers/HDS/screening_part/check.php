<?php
	$this->load->model("HDS/screening/check/m_check");
	$data['query'] = $this->m_check->show_check($sys_id)->result_array();
	/*
	foreach($data['query'] as $key => $ch)
	{	
			echo $ch['ct_name']."<br>";
	}
	*/
	$data['sys_id'] = $sys_id;
	$view = $this->hds_output("screening/check/v_check", $data,true);
?>