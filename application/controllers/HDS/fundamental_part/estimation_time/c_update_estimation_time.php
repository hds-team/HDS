<?php
	//echo "test";
	$data['ctt_status'] = $ctt_status;
	echo $data['ctt_status'];
	$this->m_dynamic->update('hds_contact_type','ctt_id',$ctt_id,$data);
	redirect(base_url('index.php/'.$this->hds_part.'/fundamental/estimation_time'));
?>