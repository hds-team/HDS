<?php

$lv_id=$this->input->post('lv_id');
$data['lv_name']=$this->input->post('lv_name');
$this->m_dynamic->update('hds_level','lv_id',$lv_id,$data);
redirect("/HDS/fundamental/level");

?>
