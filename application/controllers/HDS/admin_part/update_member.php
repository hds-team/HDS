<?php
	//----------------LOAD MODEL
	$this->load->model('HDS/admin/position/m_position');
	$member=$this->m_position->check_position();
	//-----------------ตรวจสอบ
	
	
	
	
	foreach($member->result() as $row){
		echo  "ID:". $row -> UsID." PS: ".$row ->ps_ut_id."<br>";
		if($row->ps_ut_id == NULL){
			echo "insert <br>";
			$data['ps_mb_id'] = $row -> UsID;
			$data['ps_ut_id'] = 4;
			$this->m_dynamic->insert('hds_position',$data);
		}
	}
	redirect('HDS/admin/position/');
	/*foreach($data['query_2']->result() as $row){
		echo  $row -> ps_mb_id."<br>"; 
	} */
	
	
?>