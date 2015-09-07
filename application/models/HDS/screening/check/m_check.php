<?php
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_check extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	public function show_category()
	{
		$sql = "SELECT * FROM hds_category";
		$query = $this->hds->query($sql, array());
		//$this->hds
		//->select('*')
		//->from('hds_category');
		return $query; 
	}
}
