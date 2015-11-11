<?php
	$this->load->model($this->hds_part.'/stat_part/m_stat_tor','m_stat_tor'); // lode m_stat_tor from model part
	//echo "natkamon";
	$data['query'] = $this->m_stat_tor->get_all(); //show all
	$data['proj'] = $this->m_dynamic->get_by_id('hds_tor_proj', 'tp_status', 1);
	$view = $this->hds_output('stat_part/v_stat_tor', $data, true); // Out put to View
?>