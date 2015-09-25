<?php
	$this->load->model('HDS/dev_work/ongoing/m_ongoing');
	//------- Check show all
	if($all){
		$data['query'] = $this->m_ongoing->get_request_all($this->session->userdata('UsID')); //show all
		//$data['query'] = $this->m_dev_work->get_request($this->session->userdata('UsID'));
	}
	else
	{
		$data['query'] = $this->m_ongoing->get_request($sys_id); //show only one system
	}

	$data['sys_id'] = $sys_id;
	$view = $this->hds_output('/dev_work/ongoing/v_ongoing', $data, true);
?>