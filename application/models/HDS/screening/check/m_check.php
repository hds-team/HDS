<?php
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_check extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	public function show_check($sys_id)
	{
		$sql = "SELECT * FROM hds_request
		INNER JOIN hds_category
		ON hds_request.rq_ct_id=hds_category.ct_id
		INNER JOIN hds_status
		ON hds_request.rq_st_id=hds_status.st_id
		where hds_request.rq_sys_id = ?
		";
		$query = $this->hds->query($sql, array($sys_id));
		//$this->hds
		//->select('*')
		//->from('hds_category');
		return $query; 
	}
	
}
