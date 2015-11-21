<?php
	$time_rang = array();
	//------ Convert year to christ
	$date_temp = explode("-", $from);
	$date_temp[0] = (int)$date_temp[0] - 543;
	$time_rang['from'] = $date_temp[0]."-".$date_temp[1]."-".$date_temp[2];

	//------ Convert year to christ
	$date_temp = explode("-", $to);
	$date_temp[0] = (int)$date_temp[0] - 543;
	$time_rang['to'] = $date_temp[0]."-".$date_temp[1]."-".$date_temp[2];

	$arr = array();
	//echo $where_str;
	$query = $this->m_stat_chart->get_drilldown($where_str, $group_by, $time_rang, "ctr_tp_id");
	//------- Set id for drilldown
	
	$id = array();

	foreach($query->result() as $row)
	{
		//$id[$row->ctr_value] = $row->ctr_id;
		$arr_2['name'][] = $row->ctr_value;
		$arr_2['value'][] = $row->STAT;
		$arr_2['id'][] = $row->ctr_id;
		$arr_2['tp_id'][] = $row->ctr_tp_id;
	}	
	/*
	$arr = $this->array_convert($query, $name, "STAT");

	foreach($arr as $key => $value)
	{
		$arr_2['name'][] = $key;
		$arr_2['value'][] = $value;
		$arr_2['id'][] = $id[$key];


		//echo "['".$key."', ".$value."],";
	}
	*/
	echo json_encode($arr_2);
?>