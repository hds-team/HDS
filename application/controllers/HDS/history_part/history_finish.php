<?php
	$rq_sys_id = $this->input->post('system');
	$this->load->model($this->config->item('sys_name').'/history/m_history');
	//------- Check show all
	$this->session->userdata('UsID'); //show all
	
	//category and request
	$data['category'] = $this->m_dynamic->get_all('hds_category');
	$data['cat_req'] = $this->m_dynamic->get_by_id('hds_request','rq_ct_id',20);
	//kind and request
	$data['kind'] = $this->m_dynamic->get_all('hds_kind');
	$data['kind_req'] = $this->m_dynamic->get_by_id('hds_request','rq_kn_id',3);
	//department on ums and request
	$data['depart'] = $this->m_history->get_depart();
	$data['dep_req'] = $this->m_dynamic->get_by_id('hds_request','rq_comp_id',0);
	//system
	$data['system'] = $this->m_history->get_system();
	$data['query'] = $this->m_history->get_request($rq_sys_id); //show only one system
	//---------- LOAD VIEW
	/*
	foreach($data["kind_req"]->result() as $row){
		echo $row->rq_subject;
	}
	*/
	$data['content'] = $this->hds_output("history/history_finish", $data, True);
?>