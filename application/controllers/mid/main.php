<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/../UMS_Controller.php");
class Main extends UMS_Controller {
	
	public function index()
	{
		$this->output('Ststem_name/welcom',"");
	}
}
?>