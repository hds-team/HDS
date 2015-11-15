<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_stat_tor extends CI_Model
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
	
	public function get_all(){
		
		$this->hds	
			->SELECT('*')
			->FROM('hds_request')
			->join('hds_contract',' hds_request.rq_ctr_id = hds_contract.ctr_id','left')
			->order_by('hds_request.rq_date', 'desc');
		
		return $this->hds->get();
	}

	public function set_default_tor($rq_id){
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_contract', 'hds_contract.ctr_id = hds_request.rq_ctr_id' , 'inner')
		->join('hds_tor_proj', 'hds_tor_proj.tp_id = hds_contract.ctr_tp_id' , 'inner')
		->where('hds_request.rq_id', $rq_id);
		return $this->hds->get();

	}
}
