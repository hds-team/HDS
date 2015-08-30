<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class Test extends UMS_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('HDS/m_dynamic');
	}

	public function index(){
		echo "TEST CONTROLLER<BR>";
		$query = $this->m_dynamic->get_by_id('hds_category','ct_id', 2);
		foreach($query->result() as $row){
			echo $row->ct_name;
		}

		$data['ct_name'] = "test00";
		$data['ct_status'] = 1;
		//$this->m_dynamic->insert('hds_category', $data);

		//$this->m_dynamic->update('hds_category', 'ct_id', 1, $data);

		$this->m_dynamic->delete('hds_category', 'ct_id', 3);
	}

}
