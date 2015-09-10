<?php
	$data['rq_st_id'] = 4;
	$this->m_dynamic->update('hds_request', 'rq_id', $rq_id, $data);
	redirect('HDS/dev_work/index/'.$sys_id.'#pending');
?>