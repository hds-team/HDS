 <?php
	$data['rq_st_id'] = 6;
	$st_id = 6;
	$this->save_log( $st_id, $rq_id );
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
	//redirect($this->config->item('sys_name').'/screening/index/'.$sys_id.'#check');
?>