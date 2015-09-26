<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."/HDS_Model.php");
class M_reply extends CI_Model
{
	public $db_name;
	public $ums;

	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
		$this->load->config('hds_config');

		$this->config->load('hds_config');
		$this->db_name = $this->config->item('database');
		$this->ums = $this->config->item('UMS');
	}

	public function get_request($rq_id) //get request's system
	{
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner') //inner category and request
		->join('hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner') //inner kind and request
		->join('hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner') //inner join status
		->join('hds_level_log','hds_level_log.lg_rq_id = hds_request.rq_id','inner') //don't where rq_id because hds_level_log have rq_id
		->join('hds_file','hds_file.fl_rq_id = hds_request.rq_id','inner')
		->join('hds_level',' hds_level.lv_id = hds_level_log.lg_lv_id','inner')
		->join($this->ums.'.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner') //join ums
		->join($this->ums.'.umsystem','umsystem.StID = hds_request.rq_sys_id', 'inner');
		//->where('hds_request.rq_id',$rq_id); //system's ums
		$query = $this->hds->get();
		return $query;
	}
}