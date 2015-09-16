<?php
	$data['ct_status']=$ct_status;
	$this->m_dynamic->update('hds_category','ct_id',$ct_id,$data);
	redirect("/HDS/fundamental/category");
?>
