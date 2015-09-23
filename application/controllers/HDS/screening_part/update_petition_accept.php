<?php 
	$this->load->model('HDS/screening/petition/m_petition'); // lode m_petition from Model part
	$data['rq_st_id'] = 2; // set rq_st_id to 2 after press the button 
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data); // update value 'tqble name','id of table','value get from the View page','$data that set to 2 after press the button'
	redirect($this->config->item('sys_name').'/screening/index/'.$sys_id.'#petition' ); // re the screen to index page
	
?>