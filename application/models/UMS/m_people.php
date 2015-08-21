<?php
class M_people extends CI_Model {
	
	function __construct()
	{
		//Call the Model constr.
		parent::__construct();
	}
	
	function insert(){
	
		$sql = "insert into profile("profile_id, profile_name,profile_age") values(?,?)"
		$this->ums->trans_begin();
		$this->ums->query($sql,array($this->name,$this->age));
			if ($this->ums->trans_status() === FALSE)
			{
				$this->ums->trans_rollback();
			}
			else
			{
				$this->ums->trans_commit();
			}
		}
	}

?>