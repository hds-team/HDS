<?php 
	$this->load->model('HDS/screening/petition/m_petition'); // lode m_petition from model part
	$data['rq_st_id'] = 8; // set the value of id after press the button to 8
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data); // update the value after press button equal to $data['rq_st_id'] LIKE THIS >> 'table name','table id','value get from the view page','value that set equal to 8 (change to this value after press button)
	redirect('HDS/screening/index/'.$sys_id.'#petition' ); // re page to the main screen
?>