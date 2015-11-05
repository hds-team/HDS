<?php
define('FPDF_FONTPATH',"../HDS".'/font/');
	//$this->load->library('Date_time');
	$row = $copy_request->row_array();
?>
<?php class PDF extends FPDF {
	
	//Page header
	function Header() {
		
		$this->image($this->Logo,22,10,20);
		
		//(x+,y-,ขนาด)
		//Title
		$this->SetFont('THSarabun','B',20);
		$this->SetY(17);
		$this->SetX(45);
		$this->Cell(0,0,$this->Name,0,0,'L');
		$this->Ln(8);
		$this->SetFontSize(16);
		$this->SetX(45);
		$this->Cell(0,0,$this->SubName,0,0,'L');
		//Draw line
		$this->SetLineWidth(0.4);
		$this->Line(20,33,190,33);
	}
	
	//Page footer
	function Footer()
	{
		//Position at 3.0 cm from bottom
		$this->SetLineWidth(0.4);
		$this->Line(20,283,190,283);
		$this->SetY(-7);
		$this->SetX(19);
		$this->SetFont('THSarabun','',14);
		$this->Cell(0,-4,iconv('UTF-8', 'TIS-620', 'วันที่พิมพ์ : '.date("d/m/y")),0,0,'L');
		//Page number
		$this->Cell(6,-4,iconv('UTF-8', 'TIS-620', 'หน้า '.$this->PageNo().'/{nb}'),0,0,'R');
	}
}

$pdf = new PDF();

$pdf->Logo = iconv('UTF-8', 'TIS-620', '../HDS/images/logo.jpg');//$this->config->item("logo_institute.jpg").$cfgClgLogo;
$pdf->Name = iconv('UTF-8', 'TIS-620', 'แบบฟอร์มคำร้อง');//iconv('UTF-8', 'TIS-620', $cfgClgName);
$pdf->SubName = iconv('UTF-8', 'TIS-620', 'ระบบช่วยเหลือผู้ใช้ (Help Desk System: HDs)');//iconv('UTF-8', 'TIS-620', $cfgSiteName);

//Set thai font
$pdf->SetThaiFont();

$pdf->AliasNbPages();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Set margin page.
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);

//Set initial y axis position per page
$y_axis_initial = 65;

//Set initial x position of table
$x_axis_initial = 20;
//Add first page
$pdf->AddPage();
$pdf->SetX(105);
$pdf->SetY(30);
$pdf->Ln(10);

$pdf->SetFillColor(230, 230, 255);
//$pdf->SetDrawColor(255, 0, 102);
$pdf->SetFontSize(16);
$pdf->SetY($y_axis_initial - 25);
//ความยาวของกล่อง 170 ความกว้างของกล่อง 8
//ข้อมูลพื้นฐาน
$pdf->Cell(170,8,iconv('UTF-8', 'TIS-620', '  ข้อมูลพื้นฐาน'),1,0,'L',1);
$pdf->Ln(20);

//ผู้แจ้งและองค์กร
$pdf->SetFont('THSarabun','B',16);
$pdf->SetX(29);
$pdf->Cell(10,-10,iconv('UTF-8', 'TIS-620', 'ชื่อเรื่อง '),0,0,'L');
$pdf->Cell(15,-10,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(10,-10,iconv('UTF-8', 'TIS-620', $row['rq_subject']),0,0,'R');
$pdf->SetFont('THSarabun','B',16);
$pdf->SetX(123);
$pdf->Cell(10,-10,iconv('UTF-8', 'TIS-620', 'องค์กร '),0,0,'C');
$pdf->Cell(10,-10,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(8,-10,iconv('UTF-8', 'TIS-620',  $row['rq_detail']),0,0,'R');
$pdf->Ln(10);

//วันที่แจ้งและกำหนดส่ง
$pdf->SetFont('THSarabun','B',16);
$pdf->SetX(28);
$pdf->Cell(10,-10,iconv('UTF-8', 'TIS-620', 'วันที่แจ้ง'),0,0,'L');
$pdf->Cell(17,-10,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(17,-10,iconv('UTF-8', 'TIS-620', $row['rq_date']),0,0,'R');
$pdf->SetFont('THSarabun','B',16);
$pdf->SetX(120);
$pdf->Cell(11,-10,iconv('UTF-8', 'TIS-620', 'กำหนดส่ง '),0,0,'C');
$pdf->Cell(14,-10,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(17,-10,iconv('UTF-8', 'TIS-620',  $row['lg_exp']),0,0,'R');
$pdf->Ln(20);

$pdf->SetFillColor(230, 230, 255);
$pdf->SetFontSize(16);
$pdf->SetY($y_axis_initial + 17);
//ความยาวของกล่อง 0 ความกว้างของกล่อง 8
//ช่องทางการติดต่อ
$pdf->SetFont('THSarabun','B',16);
$pdf->Cell(0,8,iconv('UTF-8', 'TIS-620', '  ช่องทางการติดต่อ'),1,0,'L',1);
$pdf->Ln(20);

foreach($copy_contact->result() as $row_contact){
//Facebook Line
	$pdf->SetFont('THSarabun','B',16);
	$pdf->SetX(25);
	$pdf->Cell(10,-10,iconv('UTF-8', 'TIS-620', $row_contact->ctt_name),0,0,'L');
	$pdf->Cell(24,-10,iconv('UTF-8', 'TIS-620', '   :'),0,0,'C');
	$pdf->SetFont('THSarabun','',16);
	$pdf->SetX(53);
	$pdf->Cell(10,-10,iconv('UTF-8', 'TIS-620', $row_contact->ctl_value),0,0,'L');
	//$pdf->SetFont('THSarabun','B',16);
	//$pdf->SetX(124);
	//$pdf->Cell(11,-10,iconv('UTF-8', 'TIS-620', 'Line'),0,0,'C');
	//$pdf->Cell(7,-10,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
	//$pdf->SetFont('THSarabun','',16);
	//$pdf->Cell(20,-10,iconv('UTF-8', 'TIS-620',  $row['rq_date']),0,0,'R');
	$pdf->Ln(10);
}

/*
//โทรศัพท์
$pdf->SetFont('THSarabun','B',16);
$pdf->SetX(28);
$pdf->Cell(11,-27,iconv('UTF-8', 'TIS-620', 'โทรศัพท์'),0,0,'L');
$pdf->Cell(17,-27,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(16,-27,iconv('UTF-8', 'TIS-620', $row['rq_date']),0,0,'R');
$pdf->Ln(20);
*/

$pdf->SetFillColor(230, 230, 255);
$pdf->SetFontSize(16);
$pdf->SetY($y_axis_initial + 60);
//ความยาวของกล่อง 0 ความกว้างของกล่อง 8
//รายละเอียดคำร้อง
$pdf->SetFont('THSarabun','B',16);
$pdf->Cell(0,8,iconv('UTF-8', 'TIS-620', '  รายละเอียดคำร้อง'),1,0,'L',1);
$pdf->Ln(20);

//ตารางรายละเอียดคำร้อง
$pdf->SetFillColor(230, 230, 255);
$pdf->SetFontSize(16);
$pdf->SetY($y_axis_initial + 68);
$pdf->Cell(32,7,iconv('UTF-8', 'TIS-620', '  ชื่อเรื่อง'),1,0,'L',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(138,7,iconv('UTF-8', 'TIS-620', '  '.$row['rq_subject']),1,0,'L',1);
$pdf->Ln(7);
$pdf->SetFillColor(230, 230, 255);
$pdf->SetFont('THSarabun','B',16);
$pdf->Cell(32,7,iconv('UTF-8', 'TIS-620', '  ประเภท'),1,0,'L',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(138,7,iconv('UTF-8', 'TIS-620', '  '.$row['ct_name']),1,0,'L',1);
$pdf->Ln(7);
$pdf->SetFillColor(230, 230, 255);
$pdf->SetFont('THSarabun','B',16);
$pdf->Cell(32,7,iconv('UTF-8', 'TIS-620', '  หมวด'),1,0,'L',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(138,7,iconv('UTF-8', 'TIS-620', '  '.$row['kn_name']),1,0,'L',1);
$pdf->Ln(7);
$pdf->SetFillColor(230, 230, 255);
$pdf->SetFont('THSarabun','B',16);
$pdf->Cell(32,7,iconv('UTF-8', 'TIS-620', '  ระดับความสำคัญ'),1,0,'L',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(138,7,iconv('UTF-8', 'TIS-620', '  '.$row['lv_name']),1,0,'L',1);
$pdf->Ln(7);
$pdf->SetFillColor(230, 230, 255);
$pdf->SetFont('THSarabun','B',16);
$pdf->Cell(32,7,iconv('UTF-8', 'TIS-620', '  ระบบ'),1,0,'L',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(138,7,iconv('UTF-8', 'TIS-620', '  '.$row['StNameT']),1,0,'L',1);
$pdf->Ln(7);
$pdf->SetFillColor(230, 230, 255);
$pdf->SetFont('THSarabun','B',16);
$pdf->Cell(32,7,iconv('UTF-8', 'TIS-620', '  เมนู'),1,0,'L',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(138,7,iconv('UTF-8', 'TIS-620', '  '.$row['rq_menu']),1,0,'L',1);
$pdf->Ln(7);
$pdf->SetFillColor(230, 230, 255);
$pdf->SetFont('THSarabun','B',16);
$pdf->Cell(32,7,iconv('UTF-8', 'TIS-620', '  รายละเอียด'),1,0,'L',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('THSarabun','',16);
$pdf->Cell(138,7,iconv('UTF-8', 'TIS-620', '  '.$row['rq_detail']),1,0,'L',1);






/*

//ชื่อเรื่อง
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'ชื่อเรื่อง '),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(12,0,iconv('UTF-8', 'TIS-620', $row['rq_subject']),0,0,'R');
$pdf->Ln(10);

//ระบบ
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'ระบบ'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', $row['StNameT']),0,0,'R');
$pdf->Ln(10);

//ประเภท
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'ประเภท'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(20,0,iconv('UTF-8', 'TIS-620', $row['ct_name']),0,0,'R');
$pdf->Ln(10);

//หมวด
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'หมวด'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(21,0,iconv('UTF-8', 'TIS-620',  $row['kn_name']),0,0,'R');
$pdf->Ln(10);

//ระดับความสำคัญ
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'ระดับความสำคัญ'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(20,0,iconv('UTF-8', 'TIS-620',  $row['lv_name']),0,0,'R');
$pdf->Ln(10);

//วันที่ส่ง
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'วันที่ส่ง'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(20,0,iconv('UTF-8', 'TIS-620',  $row['rq_date']),0,0,'R');
$pdf->Ln(10);

//กำหนดส่ง
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'กำหนดส่ง'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(20,0,iconv('UTF-8', 'TIS-620',  $row['rq_date']),0,0,'R');
$pdf->Ln(10);

//ช่องทางการติดต่อ
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'ช่องทางการติดต่อ'),0,0,'L');
$pdf->Ln(10);
$pdf->Cell(30,0,iconv('UTF-8', 'TIS-620', 'เบอร์โทร'),0,0,'C');
$pdf->Cell(16,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->Ln(10);
$pdf->Cell(24,0,iconv('UTF-8', 'TIS-620', 'อีเมล'),0,0,'C');
$pdf->Cell(28,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->Ln(10);
$pdf->Cell(24,0,iconv('UTF-8', 'TIS-620', 'อื่นๆ'),0,0,'C');
$pdf->Cell(28,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->Ln(10);

//องค์กร
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'องค์กร'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(33,0,iconv('UTF-8', 'TIS-620',  $row['dpName']),0,0,'R');
$pdf->Ln(10);

//ผู้แจ้ง
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'ผู้แจ้ง'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(20,0,iconv('UTF-8', 'TIS-620',  $row['UsName']),0,0,'R');
$pdf->Ln(10);

//รายละเอียด
$pdf->SetFont('THSarabun','B',18);
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', 'รายละเอียด'),0,0,'L');
$pdf->Cell(25,0,iconv('UTF-8', 'TIS-620', ': '),0,0,'C');
$pdf->SetFont('THSarabun','',18);
$pdf->Cell(20,0,iconv('UTF-8', 'TIS-620',  $row['rq_detail']),0,0,'R');
$pdf->Ln(10);
*/


$pdf->Output();

?>
