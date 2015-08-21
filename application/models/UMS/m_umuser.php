<?php

include_once("da_umuser.php");

class M_umuser extends Da_umuser {

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
				FROM umuser inner join umdepartment on umdepartment.dpID=umuser.UsDpID
				$orderBy	";
		$query = $this->ums->query($sql);
		return $query;
	}
	
	/*
	 * create array of pk field and value for generate select list in view, must edit PK_FIELD and FIELD_NAME manually
	 * the first line of select list is '-----àÅ×Í¡-----' by default.
	 * if you do not need the first list of select list is '-----àÅ×Í¡-----', please pass $optional parameter to other values. 
	 * you can delete this function if it not necessary.
	 */
	function get_options($optional='y') {
		$qry = $this->get_all();
		if ($optional=='y') $opt[''] = '-----àÅ×Í¡-----';
		foreach ($qry->result() as $row) {
			$opt[$row->PK_FIELD] = $row->FIELD_NAME;
		}
		return $opt;
	}
	
	// add your functions here
	function check_login($id,$passwd)
	{
		$sql="SELECT * FROM umuser inner join umdepartment on umuser.UsDpID = umdepartment.dpID WHERE UsLogin=? and UsPassword=? and UsActive=?";
		$query = $this->ums->query($sql,array($id,$passwd,1));
		
		if($query->num_rows()>0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}
	function check_login_android($id,$passwd)
	{
		$sql="SELECT * FROM umuser inner join umdepartment on umuser.UsDpID = umdepartment.dpID WHERE UsLogin=? and UsPassword=? and UsActive=? and UsAdmin=?";
		$query = $this->ums->query($sql,array($id,$passwd,1,1));
		
		if($query->num_rows()>0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}
	
	function check_user($id) 
	{ 
		$sql="SELECT * FROM umuser inner join umdepartment on umuser.UsDpID = umdepartment.dpID WHERE UsLogin=? and UsActive=?";
		$query = $this->ums->query($sql,array($id,1));
		
		if($query->num_rows()>0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}
	
	function check_pass($pass)
	{

		$sql="SELECT * FROM umuser WHERE UsID=? and UsPassword=? ";
		$passwd=md5("O]O".$pass."O[O");
		$query = $this->ums->query($sql,array($this->session->userdata('UsID'),$passwd));

		if($query->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}
	function forgotpassword() {
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_forgotpassword',$data);
		$this->load->view('template/footer');
		}
	
	function senntoemail($name,$email){
		$strSQL = "SELECT * FROM sentEmail WHERE username =? 
		OR email =? ";
		$query = $this->ums->query($strSQL,array(trim($name),trim($email)));
		$objRow = $query->num_rows();
		$objResult = $query->result_array();

		if($objRow==0)
		{
			return 0;
				 //echo "Not Found Username or Email!"; 
		}
		else
		{
				// "Your password send successful.<br>Send to mail : ".$objResult[0]["email"];	
				
				 $strTo = $objResult[0]["email"]; 
				 $strSubject = "Your Account information username and password."; 
				 $strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 // 
				 $strHeader .= "From: se.buu.ac.th;\nReply-To: se.buu.ac.th"; 
				 $strMessage = "";
				 $strMessage .= "Welcome : ".$objResult[0]["username"]."<br>";
				 $strMessage .= "Username : ".$objResult[0]["username"]."<br>"; 
				 $strMessage .= "Password : ".$objResult[0]["password"]."<br>"; 
				 $strMessage .= "================================="; 
				ini_set("sendmail_from",$strTo);
				$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);   	  	
			return 1;
		}
}
	
	function get_ID_by_name()
	{
		$sql = "SELECT UsID 
				FROM umuser 
				WHERE UsName = ?";
		$query = $this->ums->query($sql,array($this->UsName));
		if ( $withSetAttributeValue ) {
			$this->row2attribute( $query->row() );
		} else {
			return $query ;
		}
		
	}
	
	function  show($data){
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_senttoemail',$data);
		$this->load->view('template/footer');
	
	
	}
	public function search() {
	
	
		if($strSearch=="Y"){
			$sql="select * from umuser Where ".$Search2." like '%".$Search."%' "; // à¸„à¸³à¸ªà¸±à¹ˆà¸‡à¸„à¹‰à¸™à¸«à¸²
				}else{
					$sql="select * from umuser";
				}
					$Qtotal = mysql_query($sql);
	}
	function checkUserByPsId ($ps_id) {
		$sql = "select * from umuser where UsPsCode =?";
		$result = $this->ums->query($sql, array($ps_id));
		if ($result->num_rows() <> 0) {
			return $result->row_array();
		} else {
			return false;
		}
	}

	function qryUmUserByUsPsCode($usPsCode){
		$sql = "select * from umuser where UsPsCode =?";
		$query = $this->ums->query($sql, array($usPsCode));
		return $query;
	}
	function get_umuser_by_UsPsCode($id)  // ????????? function qryUmUserByUsPsCode($usPsCode)
	{
	  $sql = "SELECT *
	          FROM  ".$this->ums->database.".umuser
	          WHERE UsPsCode = ?";
			 
	  $query = $this->db->query($sql, array($id));
	  return $query;
	}
}

 // end class M_umuser
?>
