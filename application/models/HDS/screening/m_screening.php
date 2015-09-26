<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."/HDS_Model.php");
class M_screening extends CI_Model
{
	public $db_name;
	public $ums;
	
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);

		$this->config->load('hds_config');
		$this->db_name = $this->config->item('database');
		$this->ums = $this->config->item('UMS');
	}
	
	public function notification()
	{
		$this->hds
		->select(' rq_sys_id, COUNT(rq_sys_id) as total')
		->from('hds_request')
		->where('rq_st_id', 1)
		->group_by('rq_sys_id');
		return $this->hds->get();
	}
}