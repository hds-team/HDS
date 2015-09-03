<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Contact extends HDS_Model{
		
	public function get_contact(){  
		$this->hds
		->select('*')
		->from('hds_request')
		->join('ums.umuser','hds_request.rq_mb_id = ums.umuser.UsID','inner');
		
		return $this->hds->get();
	}	
}

?>
