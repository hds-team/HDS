<?php
	//echo "test";
	$this->m_dynamic->delete('hds_contact_type','ctt_id',$ctt_id);
	redirect(base_url('index.php/'.$this->hds_part.'/fundamental/communcate'));
?>