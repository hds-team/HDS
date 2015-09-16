<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_kind extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
		
	public function get_kind()
	{ 
		$this->hds
		->select(*)
		->from('hds_kind');
	}
}

?>