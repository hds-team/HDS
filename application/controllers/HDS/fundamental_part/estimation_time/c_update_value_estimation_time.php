<?php
	//echo "test";
	$ctt_id = $this->input->post('ctt_id');
	$data['ctt_name'] = $this->input->post('ctt_name');
	//echo $data['ctr_value'];
	$this->m_dynamic->update('hds_contact_type','ctt_id',$ctt_id,$data);
	redirect(base_url('index.php/'.$this->hds_part.'/fundamental/estimation_time'));
?>