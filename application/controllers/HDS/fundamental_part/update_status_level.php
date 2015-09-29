<?php
	$data['lv_status']=$lv_status;
	$this->m_dynamic->update('hds_level','lv_id',$lv_id,$data);
	redirect("/".$this->hds_part."/fundamental/level");
?>
