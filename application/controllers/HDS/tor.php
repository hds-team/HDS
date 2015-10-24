<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Tor extends HDS_Controller 
{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{ 
		$data['content'] = $this->hds_output("tor/v_tor", NULL, true);
		$this->layout_output($data);
	}
	public function ins_tor()
	{ 
		$data['content'] = $this->hds_output("tor/ins_tor", NULL, true);
		$this->layout_output($data);
	}
}

