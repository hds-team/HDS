<?php
//require(dirname(__FILE__)."../../../HDS_Model.php");
class M_tor extends CI_Model
{
	public $db_name;
	public $ums;
	
	public $tp_id;
	public $ts_tp_id;
	public $tp_name;
	public $tp_date_start;
	public $tp_date_stop;
	public $tp_year;
	public $ts_sys_id;
	public $ctr_value;
	public $ctr_number;
	public $ctr_tp_id;
	
	public function __construct()
	{
		parent::__construct();
		$this->hds = $this->load->database('hds', TRUE);
		$this->ums = $this->load->database('ums', TRUE);

		$this->config->load('hds_config');
		$this->db_name = $this->config->item('database');
		$this->ums = $this->config->item('UMS');
	}

	/* public function show_check($sys_id)
	{
		$this->hds
		->select('*')
		->from('hds_request')
		->join('hds_category', 'hds_request.rq_ct_id = hds_category.ct_id', 'inner')
		->join('hds_status', 'hds_request.rq_st_id = hds_status.st_id', 'inner')
		->join($this->ums.'.umuser', 'hds_request.rq_mb_id = '.$this->ums.'.umuser.UsID', 'inner')
		->join($this->ums.'.umsystem', 'umsystem.StID = hds_request.rq_sys_id', 'inner')
		->where('hds_request.rq_st_id', 5)
		->where('hds_request.rq_sys_id', $sys_id)
		->order_by('hds_request.rq_date', 'DESC');
		return $this->hds->get();
		
	} */

	/* public function show_check_all()
	{
		
		$sql = "SELECT * FROM hds_request
		INNER JOIN hds_category
		ON hds_request.rq_ct_id=hds_category.ct_id
		INNER JOIN hds_status
		ON hds_request.rq_st_id=hds_status.st_id
		INNER JOIN ums.umuser
		ON hds_request.rq_mb_id=ums.umuser.UsID
		where hds_request.rq_st_id = 5
		";
		$query = $this->hds->query($sql);
		return $query; 
		
	} */
	public function show_system()
	{
		$sql = "SELECT * FROM ums.umsystem";
		$query = $this->hds->query($sql);
		return $query; 
	}
	public function show_main()
	{
		$sql = "SELECT * FROM hds_tor_proj";
		$query = $this->hds->query($sql);
		return $query; 
	}
	public function show_max_ts_id()
	{
		$sql = "SELECT MAX(tp_id) AS ts_max FROM hds_tor_proj;";
		$query = $this->hds->query($sql);
		return $query; 
	}
	public function ins_hds_tor_proj()
	{
		$sql = "INSERT INTO
		hds_tor_proj (tp_name,tp_date_start,tp_date_stop,tp_year)
		VALUES (?,?,?,?)";
		$this->hds->query($sql, array( $this->tp_name,$this->tp_date_start,$this->tp_date_stop,$this->tp_year));
	}
	public function ins_hds_tor_system()
	{
		$sql = "INSERT INTO
		hds_tor_system (ts_sys_id,ts_tp_id)
		VALUES (?,?)";
		$this->hds->query($sql, array( $this->ts_sys_id,$this->ts_tp_id));
	}
	public function ins_hds_contract()
	{
		$sql = "INSERT INTO
		hds_contract(ctr_value,ctr_number,ctr_tp_id)
		VALUES (?,?,?)";
		$this->hds->query($sql, array( $this->ctr_value,$this->ctr_number,$this->ctr_tp_id));
	}
	public function show_tor_edit()
	{
		$sql = "SELECT * FROM hds_tor_proj
		INNER JOIN hds_tor_system
		ON hds_tor_proj.tp_id=hds_tor_system.ts_tp_id
		INNER JOIN hds_contract
		ON hds_tor_proj.tp_id=hds_contract.ctr_tp_id
		where hds_tor_proj.tp_id = ?
		";
		$query = $this->hds->query($sql,array( $this->tp_id));
		return $query; 
	}
	public function show_tor_edit_pro()
	{
		$sql = "SELECT * FROM hds_tor_proj
		where hds_tor_proj.tp_id = ?
		";
		$query = $this->hds->query($sql,array( $this->tp_id));
		return $query; 
	}
	public function show_tor_edit_system()
	{
		$sql = "SELECT * FROM hds_tor_system
		where hds_tor_system.ts_tp_id = ?
		";
		$query = $this->hds->query($sql,array( $this->ts_tp_id));
		return $query; 
	}
	public function show_hds_contract_limit1()
	{
		$sql = "SELECT * FROM hds_contract
		where hds_contract.ctr_tp_id = ?
		limit 1
		";
		$query = $this->hds->query($sql,array( $this->ctr_tp_id));
		return $query; 
	}
	public function show_hds_contract()
	{
		$sql = "SELECT * FROM hds_contract
		where hds_contract.ctr_tp_id = ?
		";
		$query = $this->hds->query($sql,array( $this->ctr_tp_id));
		return $query; 
	}
	public function update_proj()
	{
		$sql = "UPDATE hds_tor_proj 
		SET tp_name = ? ,
		tp_date_start = ? ,
		tp_date_stop = ? ,
		tp_year = ?
		where hds_tor_proj.tp_id = ?
		";
		$query = $this->hds->query($sql,array( $this->tp_name,$this->tp_date_start,$this->tp_date_stop,$this->tp_year,$this->tp_id));
	}
	public function delete_sys()
	{
		$sql = "DELETE 
		FROM hds_tor_system
		WHERE hds_tor_system.ts_tp_id = ?
		";
		$query = $this->hds->query($sql,array( $this->ts_tp_id));
	}
	public function delete_cont()
	{
		$sql = "DELETE 
		FROM hds_contract
		WHERE hds_contract.ctr_tp_id = ?
		";
		$query = $this->hds->query($sql,array( $this->ctr_tp_id));
	}
	public function delete_proj()
	{
		$sql = "DELETE 
		FROM hds_tor_proj
		WHERE hds_tor_proj.tp_id = ?
		";
		$query = $this->hds->query($sql,array( $this->tp_id));
	}
	public function tor_open()
	{
		$sql = "SELECT * FROM hds_contract 
		LEFT JOIN hds_request ON hds_contract.ctr_id = hds_request.rq_ctr_id
		";
		$query = $this->hds->query($sql,array());
		return $query;
	}

}
