<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Contact extends CI_Model
{
	public $hds_part;
	public $ums_part;
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
		$this->load->config('hds_config');
		$this->hds_part = $this->config->item('sys_name');
		$this->ums_part = $this->config->item('UMS');
	}
		
	public function get_contact()
	{  
		$this->hds
			->select('*')
			->from('hds_request')
			->join($this->ums_part.'.umuser','hds_request.rq_mb_id = '.$this->ums_part.'.umuser.UsID','inner')
			->join($this->ums_part.'.umdepartment',$this->ums_part.'.umdepartment.dpID = '.$this->ums_part.'.umuser.UsID','inner')
			->GROUP_BY('rq_tell','rq_email');
			
		return $this->hds->get();
	}	
}

?>
