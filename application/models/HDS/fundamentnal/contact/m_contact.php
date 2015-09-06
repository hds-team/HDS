<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Contact extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
		
	public function get_contact(){  
		$this->hds
			->select('*')
			->from('hds_request')
			->join('ums.umuser','hds_request.rq_mb_id = ums.umuser.UsID','inner');
		
		return $this->hds->get();
	}	
}

?>
