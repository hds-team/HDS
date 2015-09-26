<?php 
	$this->load->model($this->hds_part.'/screening/petition/m_petition'); // lode m_petition from Model part
	$data['rq_st_id'] = 2; // set rq_st_id to 2 after press the button 
	$st_id = $data['rq_st_id'];
	$this->save_log( $st_id, $rq_id );
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data); // update value 'tqble name','id of table','value get from the View page','$data that set to 2 after press the button'
	redirect($this->config->item('sys_name').'/screening/index/'.$sys_id.'#petition' ); // re the screen to index page
	/*
	$this->save_log( 2, $rq_id );
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data); // update value 'tqble name','id of table','value get from the View page','$data that set to 2 after press the button'
	redirect($this->config->item(sys_name).'/screening/index/'.$sys_id.'#petition' ); // re the screen to index page
	*/
	
?>