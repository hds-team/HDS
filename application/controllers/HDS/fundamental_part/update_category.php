<?php

$ct_id=$this->input->post('ct_id');
$data['ct_name']=$this->input->post('ct_name');
$this->m_dynamic->update('hds_category','ct_id',$ct_id,$data);
redirect("/".$this->hds_part."/fundamental/category");

?>
