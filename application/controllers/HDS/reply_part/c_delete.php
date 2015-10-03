<?php
	$this->m_dynamic->delete('hds_request','rq_id',$rq_id);
	$this->m_dynamic->delete('hds_level_log','lg_id',$lg_id);
	$system_name = $this->config->item('sys_name');	
	redirect($system_name);
	
	//echo $data_level['lg_exp']."<br>";
?>