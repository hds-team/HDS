<?php
	$query = $this->m_dynamic->get_by_id('hds_contract', 'ctr_tp_id', $ctr_tp_id);

	$arr = array();
	foreach($query->result() as $rs)
	{
		$arr['id'][] = $rs->ctr_id;
		$arr['value'][] = $rs->ctr_value;
		$arr['number'][] = $rs->ctr_number;
	}

	echo json_encode($arr);
?>