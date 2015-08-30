<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Model.php");
class M_dynamic extends HDS_Model{
	
	public function get_all($tb){
		$this->hds
		->select('*')
		->from($tb);
		return $this->hds->get();
	}

	public function get_by_id($tb, $tb_id, $id){
		$this->hds
		->select('*')
		->from($tb)
		->where($tb_id, $id);
		return $this->hds->get();
	}

	public function insert($tb, $data){
		$this->hds
		->insert($tb, $data);
	}

	public function update($tb, $tb_id, $id, $data){
		$this->hds
		->where($tb_id, $id)
		->update($tb, $data);
		
	}

	public function delete($tb, $tb_id, $id){
		$this->hds
		->where($tb_id, $id)
		->delete($tb);
	}

}