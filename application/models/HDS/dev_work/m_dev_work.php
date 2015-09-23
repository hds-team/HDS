<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require(dirname(__FILE__)."/HDS_Model.php");
class M_dev_work extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);
	}
	
	public function notification()
	{
		$this->hds
		->select(' rq_sys_id, COUNT(rq_sys_id) as total')
		->from('hds_request')
		->where('rq_st_id', 3)
		->or_where('rq_st_id', 2)
		->group_by('rq_sys_id');
		return $this->hds->get();
	}

	public function get_system_by_permiss($UsID){
		$this->ums
		->select('*')
		->from('umusergroup')
		->join('umgroup', 'umgroup.GpID = umusergroup.UgGpID', 'inner')
		->join('umsystem', 'umsystem.StID = umgroup.GpStID', 'inner')
		->where('umusergroup.UgUsId', $UsID)
		->group_by('umgroup.GpStID');
		return $this->ums->get();
	}

	public function get_request($UsID){

		$query = $this->get_system_by_permiss($UsID);
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_category.ct_id = hds_request.rq_ct_id', 'inner')
		->join('hds_kind', 'hds_kind.kn_id = hds_request.rq_kn_id', 'inner')
		->join('hds_status', 'hds_status.st_id = hds_request.rq_st_id', 'inner')
		->join('ums.umuser', 'umuser.UsID = hds_request.rq_mb_id', 'inner')
		->join('ums.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner');

		$index = 1;
		foreach($query->result() as $row){
			if($index == 1){
				$this->hds->where('rq_sys_id', $row->StID);
			}else{
				$this->hds->or_where('rq_sys_id', $row->StID);
			}
			$index++;
		}

		return $this->hds->get();
	}
}