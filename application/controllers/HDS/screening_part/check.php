<?php
	$this->load->model("HDS/screening/check/m_check");
	echo "dddd"."<br>";
	$data['query'] = $this->m_check->show_check($sys_id)->result_array();
	echo "dddd"."<br>";
	foreach($data['query'] as $key => $ch)
	{	
			echo $ch['ct_name']."<br>";
	}
	$view = $this->hds_output("screening/check/v_check", $data,true);
?>