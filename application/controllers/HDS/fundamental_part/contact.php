<?php
	$this->load->model('HDS/fundamentnal/contact/m_contact','contact'); 
	$data['temp']=$this->contact->get_contact()->result();
	//print_r($temp);
	//$temp=$this->contact->get_contact();
	//print_r($temp);
	$view = $this->hds_output('fundamental/contact/v_contact', $data, TRUE);
	

?>