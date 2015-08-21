
<?
class Test_model extends CI_Model{


	
	public function __construct() {
			$this->load->database();
		}
		
		public function select_main($str){
		$this->load->database('umsteam');
		$this->load->helper('url');
		//$sql= "select $sel from $table ";
		
		//$sql="SELECT StID,StNameT,StNameE,StAbbrE,StIcon FROM umsystem";
		//$result=$this->db->query($sql);
		
		//$data['dbarr'] = $this->ums->get('umuser')->result_array();
		return mysql_query($str);
		//return $quer->result_array();
		}
		
		public function add_db($insert){
		$this->load->database("umsteam");
		$this->load->helper("url");
		
		return $this->ums->insert('umsystem',$insert);
		
		
		}
		





		



		

}
 ?>