<?php
	$this->load->model("HDS/dev_work/pending/m_pending"); 						//Load model m_pending.
	$data['rq'] = $this->m_pending->get_pending($sys_id);						//Creat data['rq'] and varible -> model.
	
	/************************************** 
	foreach($data['rq']->result() as $row)
	{
		echo $row->rq_subject;
	}
	**************************************/
	
	//echo "TEST";
	//return $this->load->view("HDS/dev_work/pending/v_pending", '', true);
	
	$data['sys_id'] = $sys_id;													//Creat data['sys_id'];
	$view = $this->hds_output('dev_work/pending/v_pending', $data, true);		//View page for show data. 
?>