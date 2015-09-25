<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_check_now extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}

	public function check_now_require($sys_id)
	{
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category','hds_request.rq_ct_id=hds_category.ct_id' ,'inner')
		->join('ums.umuser', 'hds_request.rq_mb_id=ums.umuser.UsID', 'inner')
		->join('hds_status','hds_request.rq_st_id=hds_status.st_id','inner')
		->where('rq_sys_id', $sys_id)
		->where('hds_status.st_id !=', 8)
		->order_by('hds_request.rq_date', 'DESC');
		return $this->hds->get();
	} //check_now_require

	public function check_now_require_all()
	{
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category','hds_request.rq_ct_id=hds_category.ct_id' ,'inner')
		->join('ums.umuser', 'hds_request.rq_mb_id=ums.umuser.UsID', 'inner')
		->join('ums.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->join('hds_status','hds_request.rq_st_id=hds_status.st_id','inner')
		->where('hds_status.st_id !=', 8)
		->order_by('hds_request.rq_date', 'DESC');
		return $this->hds->get();
	} 
} //class m_check_now
?>