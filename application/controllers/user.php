<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('UMS_Controller.php');
class User extends UMS_Controller{
	public function __construct()
	{
		parent::__construct();
	} 

	public function ChangePassword()
	{ 
		$this->output('Gear/changepass');
	}
	
	function checkchange()
	{
		
		if($this->m_umuser->check_pass($_POST['oldpass']))
		{
			$this->m_umuser->changepass(md5("O]O".$_POST['newpass']."O[O"));
			redirect('gear', 'refresh');
		}
		else
		{
			$this->output('Gear/changepass');
		}
		
	}
	
	public function ViewProfile()
	{
		// รอเอ็มมี่ทำงานนนนนนนนนน
	}
}

?>