<?php 
	$this->load->model('HDS/dev_work/approve/M_approve');
	$data['rq_st_id'] = 6;
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
	//echo $data['rq_st_id'];
	redirect('HDS/dev_work');
?>