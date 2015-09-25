<?php
	$data['rq_st_id'] = $st_id;
	$this->save_log( $st_id, $rq_id );
	$this->m_dynamic->update('hds_request','rq_id',$rq_id,$data);
<<<<<<< HEAD
	redirect($this->config->item('sys_name').'/screening/index/'.$sys_id.'#check');
=======
	redirect($this->config->item(sys_name).'/screening/index/'.$sys_id.'#check');
>>>>>>> origin/master
?>