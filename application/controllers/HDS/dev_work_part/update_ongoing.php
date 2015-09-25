<?php
	$this->load->model('HDS/dev_work/ongoing/M_ongoing');
	$data['rq_st_id'] = 5;
	
	//------------- Save Log -------------
	
	$this->save_log($st_id,$rq_id);
	
	//----------- End Save Log ------------
	
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
	$system_name = $this->config->item('sys_name');							// add sys_name to call system name
	redirect($system_name.'/dev_work/index/'.$sys_id.'#ongoing');
?>