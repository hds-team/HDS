<?php
	//header("content-type: application/json");
	$arr = array();

	$query = $this->m_stat_chart->get_data($table_main, $key_main, $key_rq);

	if($system == "HDS")
	{
		$arr_fk_1 = explode("/", $key_main);
		$arr_fk_2 = explode("_", $arr_fk_1[0]);
		$arr = $this->array_convert($query, $arr_fk_2[0]."_name", "STAT");
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
		//echo "['".$key."', ".$value."],";
	}
	
	echo json_encode($arr_2);

	//echo "{data : [194.1, 95.6, 54.4, 29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4]}";
?>