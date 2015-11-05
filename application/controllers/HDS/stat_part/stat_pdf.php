<?php
	$this->load->model($this->hds_part.'/stat_part/m_stat_tor','m_stat_tor'); // lode m_stat_tor from model part
	//echo "natkamon";
	$data['query'] = $this->m_stat_tor->get_all(); //show all
	/*
	foreach($data['query']->result() as $row){
		echo $row->rq_subject."<br>";
	}
	*/
	//$view = $this->hds_output('stat_part/v_pdf', $data, true); // Out put to View
	//$this->hds_output('stat_part/v_pdf',NULL,true);
	$this->load->view($this->hds_part.'/stat_part/v_pdf',$data);
	?>