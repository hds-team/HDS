<?php
	//----------------LOAD MODEL
	$this->load->model('HDS/admin/position/m_position');
	$data['query']=$this->m_position->get_all();
	//----------------LOAD VIEW
	$data['content'] = $this->hds_output('admin/position/v_position', $data, TRUE);
	$this->layout_output($data);
?>