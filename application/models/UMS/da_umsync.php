<?php

include_once("my_model.php");
// edit date 3/1/2557 by apipol
class Da_umsync extends My_model {		
	
	public $last_insert_id;
	public $HRDB = "buu_hrdb";
	function __construct() {
		parent::__construct();
	}
	function sync(){
		$sql = "select CONCAT(fName, ' ', lName) as name,emailAddr,fName2,lName2,Person.personId from (".$this->HRDB.".Person inner join ".$this->HRDB.".PersonT on Person.personId = PersonT.personId) left join umuser on CONCAT(fName, ' ', lName) = umuser.UsName where UsName is null limit 0,20";
		$query = $this->ums->query($sql);
		return $query;
	}
	function check_username($username){
		$sql = "select UsLogin from umuser where UsLogin=? ";
		$query = $this->ums->query($sql,array($username));
		if($query->num_rows() < 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
}	 //=== end class Da_umuser
?>