<?php
class MY_Controller extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_umpermission','');
		$this->load->model('m_umgpermission','');
		$this->load->model('m_ummenu','');
	}
	
	function setCRUD($UsID,$gpid,$mnid)
	{	// for set Permission in the menu
		$X = 1;
        $C = 1;
        $R = 1;
        $U = 1;
        $D = 1;
		//check on Person's Permission
        $oUp = $this->m_umpermission->SearchByKey($UsID, $mnid); 
		// if query found may be in 5 permission have empty slot
        if ($oUp){
            $X = $oUp['pmX'];
            $C = $oUp['pmC'];
            $R = $oUp['pmR'];
            $U = $oUp['pmU'];
            $D = $oUp['pmD'];
        } else {// check on WorkGroup's Permission
            $oGp = $this->m_umgpermission->SearchByKey($gpid, $mnid); 
			// if query found may be in 5 permission have empty slot
            if ($oGp){
                $X = $oGp['gpX'];
                $C = $oGp['gpC'];
                $R = $oGp['gpR'];
                $U = $oGp['gpU'];
                $D = $oGp['gpD'];
            }
        }
		//set data session to use menu
        $data = array(	'X' => $X, 
                    'C' => $C,
                    'R' => $R,
                    'U' => $U,
                    'D' => $D);
        $this->session->set_userdata($data);

        return 0;
	}
	
	function showMenu()
	{
		/*
			assign variable from session StID GpID UsID
			
		*/
		$this->load->view('toolbar');
	}
	// function output use to show result of screen
	// body is content area want to show 
	// data is item want to show in content area
	// menu is left main menu all of this user see
	function output($body='error',$data='',$menu='')
	{
		if($body == 'error')
		{
			$this->load->view($body);
		}
		else
		{
			$this->load->view('header');
			$this->load->view('topbar');
			$this->load->view('toolbar',$menu);
			$this->load->view($body,$data);
			$this->load->view('footer');
		}
	}
}

?>