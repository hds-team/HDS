<?php
	$this->load->model('HDS/dev_work/ongoing/M_ongoing');
	$data['rq_st_id'] = 5;
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
	redirect('HDS/dev_work/index/'.$sys_id.'#ongoing');
?>