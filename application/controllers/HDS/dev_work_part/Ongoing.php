<?php
	$this->load->model('HDS/dev_work/ongoing/M_ongoing');
	$data['query'] = $this->M_ongoing->get_request($sys_id);
	$data['sys_id'] = $sys_id;
	//echo "test";
	$view = $this->hds_output('/dev_work/ongoing/v_ongoing', $data, true);
?>