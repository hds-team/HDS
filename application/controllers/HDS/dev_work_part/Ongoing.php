<?php
	$this->load->model('HDS/dev_work/ongoing/M_ongoing');
	$data['query'] = $this->M_ongoing->get_request();
	//echo "test";
	$view = $this->hds_output('/dev_work/ongoing/v_ongoing', $data, true);
?>