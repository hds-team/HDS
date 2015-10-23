<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class Test extends UMS_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('HDS/m_dynamic');
	}

	public function index()
	{
		echo "TEST CONTROLLER<BR>";

		echo "//-------------GET ALL <BR>";


		$query = $this->m_dynamic->get_all('hds_category');

		foreach($query->result() as $row)
		{
			echo $row->ct_id." ".$row->ct_status." ".$row->ct_name."<BR>";
		}

		echo "//-------------GET BY ID <BR>";
		

		$query_1 = $this->m_dynamic->get_by_id('hds_category','ct_id', 2);
		
		$row_1 = $query_1->row_array();

		echo $row_1['ct_id']." ".$row_1['ct_status']." ".$row_1['ct_name']."<BR>";

		echo "//-------------UPDATE INSERT DELETE <BR>";

		//-----VIEW
			//from 
			//<input name='nune' type="textbox">

		//-----CONTROLLER
		
		
		$data['ct_name'] = $this->input->post('nune');
		$data['ct_status'] = 1;

		//$this->m_dynamic->insert('hds_category', $data);

		//$this->m_dynamic->update('hds_category', 'ct_id', 3, $data);

		//$this->m_dynamic->delete('hds_category', 'ct_id', 3);
		
	}

	public function dialog_test()
	{
		$this->output('HDS/v_test');
	}


	public function Test_speed_code()
	{
		$this->benchmark->mark('code_start');
		//-------Code to test
		foreach($this->session->all_userdata() as $value)
		{
			echo $value;
		}
		$this->benchmark->mark('code_end');
		echo "<BR>TIME: ".$this->benchmark->elapsed_time('code_start', 'code_end');

	}

	public function timeline_test()
	{
		$this->output('HDS/v_test');
	}

	public function config_test()
	{
		$this->config->load('hds_config');
		echo $this->config->item('sys_name');
	}

	public function tree($query, $parent = NULL, $level = 1)
	{
		$count = 0;
		foreach($query->result() as $row)
		{
			if($row->ctr_parent == $parent)
			{
				$count++;
				for($i=0;$i<$level;$i++){
					echo "-";
				}
				echo $row->ctr_value."<BR>";
				$this->tree($query, $row->ctr_id, $level+1);
			}
			else if($count == $query->num_rows())
			{
				return 0;
			}
		}

	}

	public function print_tree()
	{
		$query = $this->m_dynamic->get_all('hds_contract');
		$this->tree($query, NULL, 1);
	}

}
//test