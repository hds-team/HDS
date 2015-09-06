<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_petition extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	
	public function get_all(){
		$this->hds
			->select('*')
			->from('hds_request')
			->join('hds_category','hds_request.rq_id = hds_category.ct_id','inner')
			->join('ums.umuser','hds_request.rq_mb_id = ums.umuser.UsID','inner');
			
		return $this->hds->get();
	}
}
