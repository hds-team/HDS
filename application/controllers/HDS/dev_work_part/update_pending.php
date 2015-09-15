<?php
	$data['rq_st_id'] = $rq_st_id; 											//Creat $data['rq_st_id'] = $rq_st_id; Exp: 2 = 2
	$this->m_dynamic->update('hds_request', 'rq_id', $rq_id, $data);		//Call model function update.
	redirect('HDS/dev_work/index/'.$sys_id.'#pending');						//Redirect page.
?>