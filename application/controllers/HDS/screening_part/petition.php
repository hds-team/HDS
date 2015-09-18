<?php
	$this->load->model('/HDS/screening/petition/m_petition','m_petition'); // lode m_pettion from model part

	//------- Check show all
	if($all){
		$data['query'] = $this->m_petition->get_all_sys(); //show all
	}
	else
	{
		$data['query'] = $this->m_petition->get_all($sys_id); // identify to get_all Funtion
	}

	$data['sys_id'] = $sys_id; // $sys_id From controller 
	$view = $this->hds_output('screening/petition/v_petition', $data, true); // Out put to View
?>