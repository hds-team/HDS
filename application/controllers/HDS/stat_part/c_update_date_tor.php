<?php
	$data['rq_id'] = $rq_id;

	$rs_date = explode("-",$date);
	$data['rq_date_tor'] = ((int)$rs_date[0]-543)."-".$rs_date[1]."-".$rs_date[2];


	$this->m_dynamic->update('hds_request', 'rq_id', $rq_id, $data);
	$query = $this->m_dynamic->get_by_id('hds_request', 'rq_id', $rq_id);
	$rs = $query->row_array();
	//echo $rs['rq_date_tor']." ".$rs['rq_ctr_id'];

	if(($rs['rq_date_tor'] == NULL) || ($rs['rq_ctr_id'] == NULL))
	{
		echo "FALSE";
		//echo $rs['rq_date_tor']." ".$rs['rq_ctr_id'];
	}
	else
	{
		echo "TRUE";	
		//echo $rs['rq_date_tor']." ".$rs['rq_ctr_id'];
	}
?>