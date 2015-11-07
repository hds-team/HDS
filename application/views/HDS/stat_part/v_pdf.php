<html>
<head>
<title></title>
</head>
<body>
<?php
	//require('fpdf.php'); 
	define('FPDF_FONTPATH','font/');
	$this->load->library('fpdf');
	
	//ini_set("session.auto_start", 0);
	$pdf=new PDF();
	$pdf->SetMargins( 5,5,5 );
	$pdf->AddPage();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->SetXY (10,50);
	//mysql_query("SET NAMES 'tis620' ");
	
				$index=1;
					foreach($query->result() as $row)
					{
						$pdf->Write(5,$row->rq_subject);
					}
	
	$pdf->SetFontSize(10);
	$pdf->Write(5,'Congratulations! You have generated a PDF.');
	
	ob_end_clean();
	$pdf->Output("MyPDF/MyPDF.pdf","D");
	
	/*for( $i=0;$i<=50;$i++ ){
		$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','ไทยครีเอทดอทคอม '. $i),0,1,"C");
	} */

	class PDF extends FPDF
	{
		function Header(){
			//$this->Image('thaicreate-logo.jpg',87,0,40);
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','page '.$this->PageNo()),0,1,"R");
			$this->Ln(20);
		}
			
		function Footer(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',10);
			$this->SetY(-15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','By... ไทยครีเอทดอทคอม'),0,1,"L");
			$this->Cell(0,0,iconv( 'UTF-8','TIS-620','Date : '.date("Y-m-d")),0,1,"R");
		}
	}
?>
	<br>
	<div>
	<center><table border="1">
	<thead>
                <tr>
                    <th style="width: 7%"><center><b>ลำดับ</b><center></th> 
                    <th class="center"><b>กิจกรรม</b></th>
                    <th style="width: 11%"><center><b>วันที่</b><center></th> 
                    <th style="width: 20%"><center><b>หมายเหตุ</b><center></th> 
                </tr>
    </thead>
	<tbody>
				<?php 
					$index=1;
					foreach($query->result() as $row)
					{
				?> 
					<tr>
						<td><center><?php echo $index++; ?></center></td>
						<td><center><?php echo $row->rq_subject; ?></center></td>
						<td><center><?php echo $this->date_time->DateThai($row->rq_date)?></center></td>
						<td><center><?php echo $row->ctr_value;?></center></td>
					</tr>
				<?php 
					} 
				?>
    </tbody>
	</table>
	</center>
	</div>
	<br>
</body>
	PDF Created Click <a href="../MyPDF/MyPDF.pdf">here</a> to Download
</html>