<?php
class HDS_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
		
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
}