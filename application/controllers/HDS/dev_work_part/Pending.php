<?php
	$this->load->model("HDS/dev_work/pending/m_pending");
	$data['rq'] = $this->m_pending->get_pending($sys_id);
	foreach($data['rq']->result() as $row){
		echo $row->rq_subject;
	} //Close loop foreach
	//echo "TEST";
	//return $this->load->view("HDS/dev_work/pending/v_pending", '', true);
	$view = $this->hds_output('dev_work/pending/v_pending', $data, true);
	
?>