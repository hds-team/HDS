<?php 
	$this->load->model($this->hds_part.'/dev_work/approve/M_approve');
	$data['rq_st_id'] = $st_id;
	
	//------------- Save Log -------------
	
	$this->save_log($st_id,$rq_id);
	
	//----------- End Save Log ------------
	
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
	//echo $data['rq_st_id'];
	$system_name = $this->config->item('sys_name');							// add sys_name to call system name
	redirect($system_name.'/dev_work/index/'.$sys_id.'#approve');
?>