<?php

include_once("da_umgroup.php");

class M_umgroup extends Da_umgroup {

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
				FROM umgroup 
				$orderBy";
		$query = $this->ums->query($sql);
		return $query;
	}
	
	/*
	 * create array of pk field and value for generate select list in view, must edit PK_FIELD and FIELD_NAME manually
	 * the first line of select list is '-----เลือก-----' by default.
	 * if you do not need the first list of select list is '-----เลือก-----', please pass $optional parameter to other values. 
	 * you can delete this function if it not necessary.
	 */
	function get_options($optional='y') {
		$qry = $this->get_all();
		if ($optional=='y') $opt[''] = '-----เลือก-----';
		foreach ($qry->result() as $row) {
			$opt[$row->PK_FIELD] = $row->FIELD_NAME;
		}
		return $opt;
	}
	
	
	// add your functions here
	function show_all()
	{
		$orderBy="";
		$sql = "SELECT * 
		FROM umgroup INNER JOIN umsystem 
		ON umgroup.GpStID = umsystem.StID
		$orderBy";
		$query = $this->ums->query($sql);
		return $query;
	}
	
	function get_by_key_with_sys($withSetAttributeValue=FALSE) {	
		$sql = "SELECT * 
				FROM umgroup INNER JOIN umsystem
				ON umgroup.GpStID =umsystem.StID
				WHERE GpID=?";
		$query = $this->ums->query($sql, array($this->GpID));
		if ( $withSetAttributeValue ) {
			$this->row2attribute( $query->row() );
		} else {
			return $query ;
		}
	}
	function get_name($Gp)
	{
		$sql = "SELECT * FROM umgroup WHERE GpID=?";
		$query = $this->ums->query($sql,array($Gp));
		foreach($query->result_array() as $group)
		{
			return $group['GpNameT'];
			
		}
	}
	function get_by_key_with_sys1($withSetAttributeValue=FALSE) {	
		$sql = "SELECT * 
				FROM umgroup 
				WHERE GpStID=?";
		$query = $this->ums->query($sql, array($this->GpStID));
		if ( $withSetAttributeValue ) {
			$this->row2attribute( $query->row() );
		} else {
			return $query ;
		}
	}
	function get_key_by_sys($withSetAttributeValue=FALSE) {	
		$sql = "SELECT GpID 
				FROM umgroup 
				WHERE GpStID=?";
		$query = $this->ums->query($sql, array($this->GpStID));
		if ( $withSetAttributeValue ) {
			$this->row2attribute( $query->row() );
		} else {
			return $query ;
		}
	}
	function updateGear() {
		// if there is no primary key, please remove WHERE clause.
		$sql = "UPDATE umgroup 
				SET	GpIcon=?  
				WHERE GpID=?";
		$this->ums->trans_begin();
		$this->ums->query($sql, array($this->GpIcon, $this->GpID));
			if ($this->ums->trans_status() === FALSE)
				{
					$this->ums->trans_rollback();
				}
				else
				{
					$this->ums->trans_commit();
				}
	}
	function delete_by_GpStID(){
		$sql = "DELETE FROM umgroup
				WHERE GpStID=?";
		$this->ums->trans_begin();
		$this->ums->query($sql, array($this->GpStID));
		if ($this->ums->trans_status() === FALSE)
			{
				$this->ums->trans_rollback();
			}
			else
			{
				$this->ums->trans_commit();
			}
	}
	function get_uniq(){
		$sql = "SELECT GpID FROM umgroup WHERE GpStID = ? AND (GpNameT = ? OR GpNameE = ?)";
		$query = $this->ums->query($sql,array($this->GpStID ,$this->GpNameT ,$this->GpNameE));
		return $query;
	}
	function get_uniq_with_ID(){
		$sql = "SELECT * FROM umgroup WHERE GpID != ? AND GpStID = ? AND (GpNameT = ? OR GpNameE = ?)";
		$query = $this->ums->query($sql,array($this->GpID ,$this->GpStID ,$this->GpNameT ,$this->GpNameE));
		return $query;
	}
	
	function get_by_key_with_sys_join_icon($withSetAttributeValue=FALSE) {	
		$sql = "SELECT * 
				FROM umgroup left join umicon on umgroup.GpIcon = umicon.IcName 
				WHERE GpStID=?";
		$query = $this->ums->query($sql, array($this->GpStID));
		if ( $withSetAttributeValue ) {
			$this->row2attribute( $query->row() );
		} else {
			return $query ;
		}
	}
	
} // end class M_umgroup
?>