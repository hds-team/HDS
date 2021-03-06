<?php

include_once("da_umusergroup.php");

class M_umusergroup extends Da_umusergroup {
	
	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	 */
	function get_all($aOrderBy=""){
		$orderBy = "";
		if ( is_array($aOrderBy) ) {
			$orderBy.= "ORDER BY "; 
			foreach ($aOrderBy as $key => $value) {
				$orderBy.= "$key $value, ";
			}
			$orderBy = substr($orderBy, 0, strlen($orderBy)-2);
		}
		$sql = "SELECT * 
				FROM umusergroup 
				$orderBy";
		$query = $this->ums->query($sql);
		return $query;
	}
	
	/*
	 * create array of pk field and value for generate select list in view, must edit PK_FIELD and FIELD_NAME manually
	 * the first line of select list is '-----���͡-----' by default.
	 * if you do not need the first list of select list is '-----���͡-----', please pass $optional parameter to other values. 
	 * you can delete this function if it not necessary.
	 */
	function get_options($optional='y') {
		$qry = $this->get_all();
		if ($optional=='y') $opt[''] = '-----���͡-----';
		foreach ($qry->result() as $row) {
			$opt[$row->PK_FIELD] = $row->FIELD_NAME;
		}
		return $opt;
	}
	
	// add your functions here

	/*
	 *
	 */
	 function get_gear()
	 {
		$UsID = $this->session->userdata('UsID');
		$sql = "SELECT * 
				FROM umusergroup inner join umgroup 
				on umusergroup.UgGpID = umgroup.GpID
				INNER JOIN umsystem
				on umsystem.StID = umgroup.GpStID
				LEFT JOIN umicon 
				on umicon.IcName = umgroup.GpIcon
				where UgUsID = ?";
		
		$query = $this->ums->query($sql,$UsID);
		
		return $query; 
	 }
	 function get_system()
	 {
		$UsID = $this->session->userdata('UsID');
		$sql = "SELECT *
				FROM umusergroup inner join umgroup 
				on umusergroup.UgGpID = umgroup.GpID
				INNER JOIN umsystem
				on umsystem.StID = umgroup.GpStID
				LEFT JOIN umicon 
				on umicon.IcName = umgroup.GpIcon
				where UgUsID = ?
				group by StID";
		
		$query = $this->ums->query($sql,$UsID);
		
		return $query; 
	 }
	 
	 function get_perSystem()
	 {
		$sql = "SELECT *
				FROM umusergroup inner join umgroup 
				on umusergroup.UgGpID = umgroup.GpID
				INNER JOIN umsystem
				on umsystem.StID = umgroup.GpStID
				where UgUsID = ?
				";
		
		$query = $this->ums->query($sql,array($this->UgUsID));
		
		return $query; 
	 }
	 
	 function search_check(){
		$sql = "SELECT *
					FROM umusergroup
					WHERE UgUsID = ? and UgGpID = ?";
		$query = $this->ums->query($sql,array($this->UgUsID,$this->UgGpID));
		
		return $query;
	 }
	 
	 function get_group(){
		$sql = "SELECT * FROM `umgroup`inner join umusergroup
					on umgroup.GpID = umusergroup.UgGpID
					inner join umsystem
					on umgroup.GpStID = umsystem.StID
					where UgUsID = ?";
		$query = $this->ums->query($sql,array($this->UgUsID));
		
		return $query;
	 }
	 
	function get_umusergroup_by_UgUsID($id) 
	{ 
		$sql = "SELECT * 
		FROM ".$this->ums->database.".umusergroup umug LEFT JOIN ".$this->ums->database.".umgroup umg 
		ON (umug.UgGpID = umg.GpID) 
		WHERE umug.UgUsID = ?"; 
		$query = $this->db->query($sql, array($id)); 
		return $query; 
	}
} // end class M_umusergroup
?>