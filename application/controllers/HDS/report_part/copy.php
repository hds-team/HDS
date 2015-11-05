<?php
	$data['copy_request'] = $this->m_report->get_copy_detail_report($rq_id);
	$data['copy_contact'] = $this->m_report->get_copy_detail_contact($rq_id);
	$this->load->view('HDS/report/v_copy', $data);
	
	
	/*foreach($query->result() as $row){
		echo "ลำดับ =".$row->rq_id."<br>";
		echo "เรื่อง =".$row->rq_subject."<br>";
		echo "หมวด =".$row->kn_name."<br>";
		echo "ประเภท =".$row->ct_name."<br>";
		echo "ระดับความสำคัญ =".$row->lv_name."<br>";
		echo "ระบบ=".$row->StNameT."<br>";
		echo "วันที่ส่ง =".$row->rq_date."<br>";
		echo "องค์กร =".$row->dpName."<br>";
		echo "ผู้ส่ง =".$row->UsName."<br>";
		echo "รายละเอียด =".$row->rq_detail;
	}*/
	
?>