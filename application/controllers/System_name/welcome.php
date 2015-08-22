<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class Welcome extends UMS_Controller {

	public function index()
	{
		$this->output('System_name/welcome',"");
	}
	//COMMENT CHAMP


}