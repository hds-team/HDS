<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_position extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);	
	}
	//--------get_all ums
	public function get_all()
	{
		/*$this->ums
		->select('*')
		->from('umuser')
		->join('umusergroup','umusergroup.UgUsID = umuser.UsID')
		->join('umgroup','umusergroup.UgGpID = umgroup.GpID')
		->where('umgroup.GpStID',25);
		return $this->ums->get(); */
		
		$this->hds
		->select('*')
		->from('hds_position')
		->join('ums.umuser','ums.umuser.UsID = hds_position.ps_mb_id','inner');
		return $this->hds->get();
	}
	//----------check position user
	public function check_position()
	{
		$this->ums
		->select('*')
		->from('umuser')
		->join('umusergroup','umusergroup.UgUsID = umuser.UsID','inner')
		->join('umgroup','umusergroup.UgGpID = umgroup.GpID','inner')
		->join('hds_v1.hds_position','hds_v1.hds_position.ps_mb_id = umuser.UsID','left')
		->where('umgroup.GpStID',25);
		return $this->ums->get();
	}
	
}