<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class Test extends UMS_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('HDS/m_dynamic');
	}

	public function index(){
		echo "TEST CONTROLLER<BR>";

		echo "//-------------GET ALL <BR>";


		$query = $this->m_dynamic->get_all('hds_category');

		foreach($query->result() as $row){
			echo $row->ct_id." ".$row->ct_status." ".$row->ct_name."<BR>";
		}

		echo "//-------------GET BY ID <BR>";
		

		$query_1 = $this->m_dynamic->get_by_id('hds_category','ct_id', 2);
		
		$row_1 = $query_1->row_array();

		echo $row_1['ct_id']." ".$row_1['ct_status']." ".$row_1['ct_name']."<BR>";

		echo "//-------------UPDATE INSERT DELETE <BR>";

		//-----VIEW
			from 
			<input name='nune' type="textbox">

		//-----CONTROLLER
		
		
		$data['ct_name'] = $this->input->post('nune');
		$data['ct_status'] = 1;

		//$this->m_dynamic->insert('hds_category', $data);

		//$this->m_dynamic->update('hds_category', 'ct_id', 3, $data);

		//$this->m_dynamic->delete('hds_category', 'ct_id', 3);
		
	}

}
