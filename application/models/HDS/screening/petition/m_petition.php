<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_petition extends CI_Model
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
	
	public function get_all($sys_id)
	{
		$this->hds
			->select('*')
			->from('hds_request')
			->join('hds_category','hds_request.rq_ct_id = hds_category.ct_id','inner')
			->join('hds_status','hds_request.rq_st_id = hds_status.st_id','inner')
			->join($this->ums.'.umuser','hds_request.rq_mb_id = '.$this->ums.'.umuser.UsID','inner')
			->where('hds_request.rq_sys_id', $sys_id) // use only rq_sys_id that value equal to $sys_id
			->where('hds_request.rq_st_id', 1) // use only rq_st_id that value equal to 1 only
			->order_by('hds_request.rq_date', 'DESC');
		return $this->hds->get();
	}

	public function get_all_sys()
	{
		$this->hds
			->select('*')
			->from('hds_request')
			->join('hds_category','hds_request.rq_ct_id = hds_category.ct_id','inner')
			->join('hds_status','hds_request.rq_st_id = hds_status.st_id','inner')
			->join($this->ums.'.umuser','hds_request.rq_mb_id = '.$this->ums.'.umuser.UsID','inner')
			->join($this->ums.'.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
			->where('hds_request.rq_st_id', 1) // use only rq_st_id that value equal to 1 only
			->order_by('hds_request.rq_date', 'DESC');
			
		return $this->hds->get();
	}
}
