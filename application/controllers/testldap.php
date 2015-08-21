<?php
class Testldap extends CI_Controller{	
	public function __construct()
	{ 
		parent::__construct();
	}
	public function index()
	{
		$this->load->library('service_ldap');
		if($this->service_ldap->connect())
		{
			echo "555<br />";
		}
		
		if($this->service_ldap->authenticate('54160123','[p0is0n]'))
		{
			echo "54160123 True<br />";
		}
		else
		{
			echo "54160123 False<br />";
		}

		if($this->service_ldap->authenticate('54030996','21e29n09'))
		{
			echo "54160123 True2<br />";
		}
		else
		{
			echo "54160123 False2<br />";
		}
		if($this->service_ldap->authenticate('54160123','54160123'))
		{
			echo "54160123 True3<br />";
		}
		else
		{
			echo "54160123 False3<br />";
		}
		$this->service_ldap->close();
	}
}

?>