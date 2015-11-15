<?php
	$query = $this->m_dynamic->get_by_id('hds_request', 'rq_id', $rq_id);
	$rs = $query->row_array();
	if($rs['rq_ctr_id'])
	{
		echo $rs['rq_ctr_id'];
	}
	else
	{
		echo "FALSE";
	}
?>