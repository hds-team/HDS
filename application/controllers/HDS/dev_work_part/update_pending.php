<?php
	$data['rq_st_id'] = $rq_st_id;											//Creat $data['rq_st_id'] = $rq_st_id; Exp: 2 = 2
	
	//------------- Save Log -------------
	
	$this->save_log($rq_st_id,$rq_id);
	
	//----------- End Save Log ------------
	
	$this->m_dynamic->update('hds_request', 'rq_id', $rq_id, $data);		//Call model function update.
	$system_name = $this->config->item('sys_name');							// add sys_name to call system name
	//redirect($system_name.'/dev_work/index/'.$sys_id.'#pending');			//Redirect page.
?>