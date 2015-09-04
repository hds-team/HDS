<?php
	$this->load->model('HDS/dev_work/ongoing/M_ongoing');
	$data['query'] = $this->M_ongoing->get_request();
	foreach($data['query']->result() as $row){
		$rq_mb_id = $row->rq_mb_id;
	
		$query_1 = $this->M_ongoing->get_ums($rq_mb_id);
	
	$row_1 = $query_1->row_array();
	$data['UsName'] = $row_1['UsName'];
	}
	//echo "test";
	$view = $this->hds_output('/dev_work/ongoing/v_ongoing', $data, true);
?>