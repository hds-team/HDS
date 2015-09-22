<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."/HDS_Model.php");
class M_dev_work extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	
	public function notification()
	{
		$this->hds
		->select(' rq_sys_id, COUNT(rq_sys_id) as total')
		->from('hds_request')
		->where('rq_st_id', 3)
		->or_where('rq_st_id', 2)
		->group_by('rq_sys_id');
		return $this->hds->get();
	}
}