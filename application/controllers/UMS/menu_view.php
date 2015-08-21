<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_view extends CI_Controller {



	public function index(){
		/*echo anchor('base_view/createAss','createAss')."<br>";	
		echo anchor('base_view/listAss','listAss')."<br>";	
		echo anchor('base_view/section','section')."<br>";	
		echo anchor('base_view/sectionAdd','sectionAdd')."<br>";
		echo anchor('base_view/sectionAddRQ','sectionAddRQ')."<br>";
		echo anchor('base_view/sectionAddTQ','sectionAddTQ')."<br>";
		echo anchor('base_view/quetion','quetion')."<br>";
        echo anchor('base_view/login','login')."<br>";
		echo anchor('base_view/register','register')."<br>";
		echo anchor('base_view/show','show')."<br>";
		echo anchor('base_view/exRQ','exRQ')."<br>";
		echo anchor('base_view/exTQ','exTQ')."<br>";
		echo anchor('base_view/sample','sample')."<br>";*/
		echo anchor('menu_view/perMissionG')."<br>";
		echo anchor('menu_view/perMissionP')."<br>";
		echo anchor('menu_view/showSystem')."<br>";
		echo anchor('menu_view/showWorkG')."<br>";
		echo anchor('menu_view/showService')."<br>";
		echo anchor('menu_view/showQuestion')."<br>";
		echo anchor('menu_view/showMenu')."<br>";
		echo anchor('menu_view/showUser')."<br>";
		echo anchor('menu_view/showWGroup')."<br>";
		echo anchor('menu_view/main')."<br>";
		echo anchor('menu_view/testv')."<br>";
	}

		public function perMissionG(){
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_PermissionG');
		$this->load->view('template/footer');		
	}
	
		public function perMissionP(){
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_PermissionP');
		$this->load->view('template/footer');		
	}

		public function showSystem(){
		//$this->load->model('test_model');
		//$str = "SELECT StID,StNameT,StNameE,StAbbrE,StIcon FROM umsystem";

		//$data['dbarr'] = $this->test_model->select_main($str);
		$this->load->model("UMS/m_umsystem");
		$data['dbarr'] = $this->m_umsystem->get_all();
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_showSystem',$data);
		$this->load->view('template/footer');		
	}
	
		public function showWorkG(){
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_showWorkG');
		$this->load->view('template/footer');		
	}
	
		public function ShowService(){
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_showService');
		$this->load->view('template/footer');		
	}
	
		public function ShowQuestion(){
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_showQuestion');
		$this->load->view('template/footer');		
	}
	
		public function showMenu(){
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_showMenu');
		$this->load->view('template/footer');		
	}
		public function showUser(){
		$this->load->model("UMS/m_umuser");
		$data['dbarr'] = $this->m_umuser->get_all();
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_showUser',$data);
		$this->load->view('template/footer');		
	}
		public function ShowWGroup() {
		$this->load->view('template/header');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_showWGroup');
		$this->load->view('template/footer');
		
		}
		
		public function main(){
		$this->load->view('template/header2');
		$this->load->view('template/topbar');
		$this->load->view('template/toolbar');
		$this->load->view('UMS/v_main');
		$this->load->view('template/footer');		
	}
		
		public function add(){
		$nameT = $this->input->post("StNameT");
		$nameE = $this->input->post("StNameE");
		$abbrT = $this->input->post("StAbbrT");
		$abbrE = $this->input->post("StAbbrE");
		$desc = $this->input->post("StDesc");
		$url = $this->input->post("StURL");
		$icon = $this->input->post("StIcon");
		$insert = array(
                    "StNameT" => $nameT,
                    "StNameE" => $nameE,
					"StAbbrT" => $abbrT,
					"StAbbrE" => $abbrE,
					"StDesc" => $desc,
					"StURL" => $url,
					"StIcon" => $icon
                   );
				   
				   $this->load->model('UMS/test_model');
					$this->test_model->add_db($insert);
		
	}
	
		public function testv(){
		$this->load->model('UMS/test_model');
		$data['dbarr'] = $this->test_model->select_main();
		//$test['db'] = $this->m_umuser->test1();

		$this->load->view('testv',$data);
	
	}
	
}