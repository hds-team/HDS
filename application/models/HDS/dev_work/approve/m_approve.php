<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../HDS_Model.php");
class M_approve extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	public function get_report(){
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_reply', 'hds_reply.rp_rq_id = hds_request.rq_id', 'inner')
		->join('hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner')
		->join('hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner')
		->join('ums.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner');
		return $this->hds->get();
	}//Close the function's get_report 

}//Close the class
