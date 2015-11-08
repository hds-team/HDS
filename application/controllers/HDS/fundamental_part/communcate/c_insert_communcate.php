<?php
	//echo "test";
	$data['ctt_name'] = $this->input->post('ctt_name');
	$data['ctt_status'] = 1;
	//echo $data['ctr_value'];
	$this->m_dynamic->insert('hds_contact_type',$data);
	redirect(base_url('index.php/'.$this->hds_part.'/fundamental/communcate'));
?>