<html>
<body>
<?php 
	define('FPDF_FONTPATH','font/');
	$this->load->library('fpdf');
	$pdf=new PDF();
	$pdf->SetMargins( 10,10,5 );
	$pdf->AddPage(); 
	/*$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->SetXY (10,30); */ //########Set All of Document########
	
	//ini_set("session.auto_start", 0);
	//mysql_query("SET NAMES 'tis620' ");
	//iconv('iso-8859-1', 'utf-8', $s);

					/*foreach($query->result() as $row) //########est Export by foreach for each value########
					{
						//$pdf->Write(5,$row->rq_subject);
						  $pdf->Write(8,iconv("UTF-8","TIS-620",$row->rq_subject));
						//$pdf->Cell(25,8,iconv("UTF-8","TIS-620", $result["username"]),1,0,'L');
					}*/
					$pdf->AddFont('angsana','B','angsab.php');
					$pdf->SetFont('angsana','B',16);
					$pdf->Cell(15,7,iconv("UTF-8","TIS-620","ลำดับ"),1,0,'C');
					$pdf->Cell(100,7,iconv("UTF-8","TIS-620","กิจกรรม"),1,0,'C');
					$pdf->Cell(30,7,iconv("UTF-8","TIS-620", "วันที่"),1,0,'C');
					$pdf->Cell(45,7,iconv("UTF-8","TIS-620", "หมายเหตุ"),1,0,'C');
					$pdf->Ln();
					$cnt = 0;
					 
					$pdf->AddFont('angsana','','angsa.php');
					$pdf->SetFont('angsana','',16);
					$index=1;
					foreach($query->result() as $row)
					{
						$pdf->Cell(15,7,iconv("UTF-8","TIS-620",$index++),1,0,'C');
						$pdf->Cell(100,7,iconv("UTF-8","TIS-620",$row->rq_subject),1,0,'L');
						$pdf->Cell(30,7,iconv("UTF-8","TIS-620",$this->date_time->DateThai($row->rq_date)),1,0,'C');
						$pdf->Cell(45,7,iconv("UTF-8","TIS-620",$row->ctr_value),1,0,'C');
						$pdf->Ln(); 
						if($cnt == 35)
						{
							$cnt = 0;
							$pdf->AddPage();
						}
					}
	
	/*$pdf->SetFontSize(10); 
	$pdf->Write(5,'TEST Export some text.');*/ ########Test export normall text########
	
	ob_end_clean();
	$pdf->Output("MyPDF/MyPDF.pdf","D");
	
	/*for( $i=0;$i<=50;$i++ ){
		$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','ไทยครีเอทดอทคอม '. $i),0,1,"C");
	} */

	class PDF extends FPDF
	{		
		function Header(){
			if($this->PageNo() == 1 || $this->PageNo() != 1){ // Use for if want non-no of page number 1 [first page dont have a number -> use this !=1]
			//$this->Image('thaicreate-logo.jpg',87,0,40);	
			$this->SetTextColor(105, 105, 105);
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',13);
			$this->Cell(0,0,iconv("UTF-8","TIS-620","โครงการดูแลบำรุงรักษาระบบสารสนเทศและระบบเครื่องแม่ข่ายคอมพิวเตอร์ ของวิทยาลัยการสาธารณสุขสิรินธร จังหวัดขอนแก่น "),0,0,'L');
			$this->Cell(-5,0,iconv('UTF-8','TIS-620',''.$this->PageNo()),0,1,"R");
			$this->Line(10,15,200,15);
			$this->Ln(20); //Blank space for 20
			}
		}
			 
		function Footer(){
			if($this->PageNo() == 1){ 
			$this->SetTextColor(105, 105, 105);
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',13);
			$this->SetY(-15);
	 		//$this->Cell(0,0,iconv( 'UTF-8','TIS-620','test'),0,0,"L");
			//$this->Cell(-5,0,iconv( 'UTF-8','TIS-620','Date : '.date("Y-m-d")),0,1,"R");
			$this->Cell(190,0,iconv("UTF-8","TIS-620","ห้องปฏิบัติการวิจัยวิศวกรรมระบบสารสนเทศ คณะวิทยาการสารสนเทศ มหาวิทยาลัยบูรพา "),0,1,'R'); //-5 old value if not have line 2 of right
			$this->Ln(5);
			$this->Cell(190,0,iconv("UTF-8","TIS-620","วิทยาลัยการสาธารณสุขสิรินธร จังหวัดขอนแก่น สถาบันพระบรมราชชนก "),0,1,'R');
			$this->Line(10,270,200,270);  
			}
		}
	}
?>
</body>
	PDF Created Click <a href="../MyPDF/MyPDF.pdf">here</a> to Download
</html>