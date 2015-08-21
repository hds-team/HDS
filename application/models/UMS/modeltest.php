<?php 
 class modeltest extends CI_model{
 	function test1(){
	$sql = "SELECT * 
				FROM umuser ";
		$data = $this->ums->query($sql);
		return $data->result_array();
	}

	
}
?>