<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_stat_chart extends CI_Model
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
	
	public function get_data($table_main, $key_main, $key_rq, $time_rang){

		$this->hds
		->select('*, COUNT(hds_request.rq_id) as STAT')
		->from('hds_request')
		->join($table_main, $table_main.'.'.$key_main.' = hds_request.'.$key_rq, 'right')
		->where('hds_request.rq_date >=', $time_rang['from'])
		->where('hds_request.rq_date <=', $time_rang['to'])
		->group_by($table_main.'.'.$key_main);

		return $this->hds->get();
	}

	public function get_tor($group_by, $time_rang){
		$this->hds
		->select('*, COUNT(hds_request.rq_id) as STAT')
		->from('hds_request')
		->join('hds_contract', 'hds_contract.ctr_id = hds_request.rq_ctr_id', 'right')
		->join('hds_tor_proj', 'hds_tor_proj.tp_id = hds_contract.ctr_tp_id', 'right')
		->where('hds_request.rq_date >=', $time_rang['from'])
		->where('hds_request.rq_date <=', $time_rang['to'])
		->group_by($group_by);
		return $this->hds->get();
	}
}
