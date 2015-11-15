<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Date_time{
	public function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ษ.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

	public function date_textbox($strDate)
	{
		$splite = explode("-",$strDate);
		$date_temp = $splite[2]."/".$splite[1]."/".((int)$splite[0]+543);
		return $date_temp;
	}
}
?>