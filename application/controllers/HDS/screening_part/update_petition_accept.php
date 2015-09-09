<?php 
	$this->load->model('HDS/screening/petition/m_petition');
	$data['rq_st_id'] = 2;
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
	redirect('HDS/screening');
	
?>