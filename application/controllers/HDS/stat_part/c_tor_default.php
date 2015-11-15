<?php
	$query = $this->m_stat_tor->set_default_tor($rq_id);
	$result = $query->row_array();
	$arr = array();
	$arr['ctr_id'] = $result['ctr_id'];
	$arr['tp_id'] = $result['tp_id'];

	echo json_encode($arr);
?>