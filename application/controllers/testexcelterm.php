<?php
class Testexcelterm extends CI_Controller{	
	public function __construct()
	{ 
		parent::__construct();
	}
	public function index()
	{
		header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=test.xls');
		echo '<TABLE  BORDER=10 CELLSPACING=2 CELLPADDING=10>';
		echo '<CAPTION>คณะ</CAPTION>';
		echo '<TR>';
		echo '<TD ALIGN = "center">ปีการศึกษา</TD>';
		echo '<TD ALIGN = "center">คณะ</TD>';
		echo '<TD ALIGN = "center">หลักสูตรวิชาที่เกี่ยวข้อง</TD>';
		echo  '</TR>';
		
		echo '<TR>';
		echo '<TD ALIGN = "center">.....ปีการศึกษา...</TD>';
		echo '<TD ALIGN = "center">.....คณะ..........</TD>';
		echo '<TD ALIGN = "center">.....ลักสูตรวิชาที่เกี่ยวข้อง.......</TD>';
		echo  '</TR>';
		
		echo '<TR>';
		echo '<TD ALIGN = "center">......ปีการศึกษา.................</TD>';
		echo '<TD ALIGN = "center">......คณะ.........................</TD>';
		echo '<TD ALIGN = "center">.....หลักสูตรวิชาที่เกี่ยวข้อง..............</TD>';
		echo  '</TR>';
		
		echo '<TR>';
		echo '<TD ALIGN = "center">.....ปีการศึกษา...................</TD>';
		echo '<TD ALIGN = "center">...........คณะ.........</TD>';
		echo '<TD ALIGN = "center">....หลักสูตรวิชาที่เกี่ยวข้อง...............</TD>';
		echo  '</TR>';
		
		echo '</TABLE>';
		
	}
}

?>