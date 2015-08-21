<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('UMS_Controller.php');
class SyncHR extends UMS_Controller{
// this version add user one by one
	public function __construct(){
		parent::__construct();
		$this->load->model('UMS/m_umuser');
		$this->load->model('UMS/m_umsystem');
		$this->load->model('UMS/m_umpermission');
		$this->load->model('UMS/m_ummenu');
		$this->load->model('UMS/m_umusergroup');
		$this->load->model('UMS/m_umgroup');
		$this->load->model('UMS/m_umwgroup');
		$this->load->model('UMS/m_umquestion');
		$this->load->model('UMS/m_umdepartment');
		$this->load->model('UMS/da_umsync');
		$this->load->model('UMS/m_umgroupdefault');
	}
	public function index(){
		$data['user'] = $this->m_umuser->get_all();
		$this->output('UMS/v_syncHR',$data);
	}
	public function search(){
		$r = $this->da_umsync->sync();
		$groupname = $this->m_umwgroup->get_all();
		header ('Content-type: text/html; charset=utf-8');
		
		foreach($r->result_array() as $row){
			echo "<tr>";
			echo "<td><input name='UsPsCode[]' type='hidden' value='".$row['personId']."' />
				<input name='UsName[]' type='text' value='".$row['name']."' readonly /></td>";
			echo "<td><input name='UsEmail[]' type='text' value='".$row['emailAddr']."' readonly /></td>";
			echo "<td><input name='UsLogin[]' class='user' type='text' value='".strtolower($row['fName2'].substr($row['lName2'],0,1))."' /><input class='check' type='button' value='validate user' onclick='valid(this)'/></td>";
			echo "<td><input class='delete' type='button' onclick='delete_row(this)' value='delete' /></td>";
			echo "</tr>";
		}

	}
	public function check_username($user){
		$is_empty = $this->da_umsync->check_username($user);
		header ('Content-type: text/html; charset=utf-8');
		echo $is_empty;
	}
	public function syncing(){
		//Default User
		$DefaultSyncWgID = 10; // WgID from umwgroup table
		$DefaultSyncDpID = 0;  // DpID from umdepartment table
		$UsPsCode = $this->input->post('UsPsCode');
		$UsName = $this->input->post('UsName');
		$UsEmail = $this->input->post('UsEmail');
		$UsLogin = $this->input->post('UsLogin');
		/*foreach( $UsPsCode as $key => $PsCode){
			echo "key: ".$key;
			echo " PsCode ".$PsCode;
			echo " Name ".$UsName[$key];
			echo " Email ".$UsEmail[$key];
			echo " Login ".$UsLogin[$key];
			echo "<br />";
			
		}*/
		foreach( $UsPsCode as $key => $PsCode){
			$this->m_umuser->UsID = "";
			$this->m_umuser->UsPsCode = $PsCode;
			$this->m_umuser->UsName = $UsName[$key];
			$this->m_umuser->UsWgID = $DefaultSyncWgID;
			$this->m_umuser->UsLogin = $UsLogin[$key];
			$this->m_umuser->UsPassword = md5("O]O".$UsLogin[$key]."O[O");
			$this->m_umuser->UsQsID = 1;
			$this->m_umuser->UsDpID = $DefaultSyncDpID;
			$this->m_umuser->UsAnswer = "answer";
			$this->m_umuser->UsEmail = $UsEmail[$key];
			$this->m_umuser->UsDesc = "Sync Form HR";
			$this->m_umuser->UsActive = 1;
			$this->m_umuser->UsAdmin = 0;
			$this->m_umuser->UsPwdExpDt = 0;
			$this->m_umuser->UsUpdDt = 0;
			$this->m_umuser->UsUpdUsID = 0;
			$this->m_umuser->UsSessionID = 0;
			
			$this->ums->trans_begin();
			$this->m_umuser->insert();
			if($this->ums->trans_status() === false)
			{
				$this->ums->trans_rollback();
				$this->output('error');
			}
			else
			{
				$field = $this->m_umuser->get_by_many_add()->row_array();
				$data['search'] = $this->m_umgroupdefault->get_by_default($DefaultSyncWgID)->result_array();
			//Save History
				$new = $this->m_umuser->get_by_id($field['UsID'])->row_array();
				$sql = "(".$new['UsID'].",".$new['UsName'].",".$new['UsLogin'].",".$new['UsPassword'].",".$new['UsPsCode'].",".$new['UsWgID'].",".$new['UsQsID'].",".$new['UsAnswer'].",".$new['UsEmail'].",".$new['UsActive'].",".$new['UsAdmin'].",".$new['UsDesc'].",".$new['UsPwdExpDt'].",".$new['UsUpdDt'].",".$new['UsUpdDt'].",".$new['UsUpdUsID'].",".$new['UsSessionID'].",".$new['UsDpID'].")";
				$desc = "insert umuser ( UsID , UsName , UsLogin , UsPassword , UsPsCode , UsWgID , UsQsID , UsAnswer , UsEmail , UsActive , UsAdmin , UsDesc , UsPwdExpDt , UsUpdDt , UsUpdDt , UsUpdUsID , UsSessionID , UsDpID )";
				$HtID = $this->m_umhistory->insert("umuser",NULL,$sql,$new['UsID'],$desc);
			// Save Log
				$this->m_umlog->adddata("umuser",$HtID);
				
				foreach($data['search'] as $search) {
					$this->m_umusergroup->UgUsID = $field['UsID'];
					$this->m_umusergroup->UgGpID = $search['GdGpID'];
					$this->m_umusergroup->UgID = 1;
					$this->m_umusergroup->UgGpID = $search['GdGpID'];
					$this->m_umusergroup->UgUsID = $field['UsID'];
					$this->m_umusergroup->insert();
					// Save History
					$sqlgp = "( 0 , ".$search['GdGpID']." , ".$field['UsID']." )";
					$desc = "insert umusergroup ( UgID , UgGpID , UgUsID )";
					$HtID = $this->m_umhistory->insert("umusergroup",NULL,$sqlgp,$field['UsID'],$desc);
					// Save Log
					$this->m_umlog->adddata("umusergroup",$HtID);
				}
	
				

				$this->ums->trans_commit();
				
			}
		}
		redirect('UMS/showUser', 'refresh');
	}
	
}
?>