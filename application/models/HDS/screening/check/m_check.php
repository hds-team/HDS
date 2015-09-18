<?php
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_check extends CI_Model
{
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
		INNER JOIN ums.umuser
		ON hds_request.rq_mb_id=ums.umuser.UsID
		where hds_request.rq_sys_id = ? and hds_request.rq_st_id = 5
		";
		$query = $this->hds->query($sql, array($sys_id));
		//$this->hds
		//->select('*')
		//->from('hds_category');
		return $query; 
	}

	public function show_check_all()
	{
		/*
		$sql = "SELECT * FROM hds_request
		INNER JOIN hds_category
		ON hds_request.rq_ct_id=hds_category.ct_id
		INNER JOIN hds_status
		ON hds_request.rq_st_id=hds_status.st_id
		INNER JOIN ums.umuser
		ON hds_request.rq_mb_id=ums.umuser.UsID
		where hds_request.rq_st_id = 5
		";
		$query = $this->hds->query($sql);
		return $query; 
		*/

		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_request.rq_ct_id = hds_category.ct_id', 'inner')
		->join('hds_status', 'hds_request.rq_st_id = hds_status.st_id', 'inner')
		->join('ums.umuser', 'hds_request.rq_mb_id = ums.umuser.UsID', 'inner')
		->join('ums.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->where('hds_request.rq_st_id', 5);
		return $this->hds->get();
		
		//$this->hds
		//->select('*')
		//->from('hds_category');
		
	}
	
}
