<?php
	$this->load->model("HDS/screening/check/m_check");
	echo "dddd"."<br>";
	$data['query'] = $this->m_check->show_category()->result_array();
	echo "dddd"."<br>";
	foreach($data['query'] as $key => $cate)
	{	
			echo $cate['ct_name']."<br>";
	}
	$view = $this->hds_output("screening/check/v_check", NULL,true);
?>