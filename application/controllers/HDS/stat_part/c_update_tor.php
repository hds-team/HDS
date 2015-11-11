<?php
	$data['rq_ctr_id'] = $ctr_id;
	$this->m_dynamic->update('hds_request', 'rq_id', $rq_id, $data);
	$query = $this->m_dynamic->get_by_id('hds_contract', 'ctr_id', $ctr_id);

	$result = $query->row_array();
	echo $result['ctr_number'];
?>