<?php
	$this->load->model($this->config->item('sys_name').'/history/m_history');
	//------- Check show all
	$this->session->userdata('UsID'); //show all
	$data['query'] = $this->m_history->get_request(); //show only one system

	//---------- LOAD VIEW
	/*foreach($data["query"]->result() as $row){
		echo $row->rq_st_id;
	}*/
	$data['content'] = $this->hds_output("history/history_finish", $data, True);
?>