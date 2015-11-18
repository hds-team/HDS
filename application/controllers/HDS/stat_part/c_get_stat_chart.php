<?php
	//header("content-type: application/json");

	//---- Set time rang to array
	$date_temp = array();
	$date_rang = array();

	//------ Convert year to christ
	$date_temp = explode("-", $from);
	$date_temp[0] = (int)$date_temp[0] - 543;
	$time_rang['from'] = $date_temp[0]."-".$date_temp[1]."-".$date_temp[2];

	//------ Convert year to christ
	$date_temp = explode("-", $to);
	$date_temp[0] = (int)$date_temp[0] - 543;
	$time_rang['to'] = $date_temp[0]."-".$date_temp[1]."-".$date_temp[2];

	$arr = array();
	$id = array();
	if($table_main == "hds_tor_proj")
	{
		$query = $this->m_stat_chart->get_tor($key_main, $time_rang); //pass key_main is a group by 
	}
	else
	{
		$query = $this->m_stat_chart->get_data($table_main, $key_main, $key_rq, $time_rang);
	}

	if($system == "HDS")
	{
		if($table_main == "hds_tor_proj")
		{
			//$arr = $this->array_convert($query, "tp_name", "STAT");
			$arr = $this->array_convert($query, "tp_name", "STAT");

			//-------- Set id
			foreach($query->result() as $row)
			{
				$id[$row->tp_name] = $row->tp_id;
			}
		}
		else
		{
			$arr_fk_1 = explode("/", $key_main);
			$arr_fk_2 = explode("_", $arr_fk_1[0]);
			$arr = $this->array_convert($query, $arr_fk_2[0]."_name", "STAT");
		}
	}
	else if($system == "UMS")
	{
		$index = "";
		$value = "";

		switch($table_main)
		{
			case $this->ums_part.'.umsystem' 	: 	$index = "StNameT";
									break;
			case $this->ums_part.'.umdepartment'	:	$index = "dpName";
									break;
		}

		$arr = $this->array_convert($query, $index, "STAT");
	}

	$arr_2 = array();
	foreach($arr as $key => $value)
	{
		$arr_2['name'][] = $key;
		$arr_2['value'][] = $value;
		if($table_main == "hds_tor_proj")
		{
			$arr_2['id'][] = $id[$key];
		}else
		{
			$arr_2['id'][] = 0;
		}
		//echo "['".$key."', ".$value."],";
	}
	
	echo json_encode($arr_2);

	//echo "{data : [194.1, 95.6, 54.4, 29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4]}";
?>