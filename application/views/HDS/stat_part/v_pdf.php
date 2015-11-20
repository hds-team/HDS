<?php
$strExcelFileName="Member-All.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");

/*$sql=mysql_query("select * from tb_member");
$num=mysql_num_rows($sql);*/
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body> 
<strong>โครงการดูแลบำรุงรักษาระบบสารสนเทศและระบบเครื่องแม่ข่ายคอมพิวเตอร์ ของวิทยาลัยการสาธารณสุขสิรินธร จังหวัดขอนแก่น</strong><br>
<strong>รายงาน วันที่ <?php echo date("d/m/Y");?> </strong><br>
<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
<tr>
<td width="94" height="30" align="center" valign="middle" ><strong>ลำดับ</strong></td>
<td width="200" align="center" valign="middle" ><strong>กิจกรรม</strong></td>
<td width="181" align="center" valign="middle" ><strong>วันที่</strong></td>
<td width="181" align="center" valign="middle" ><strong>หมายเหตุ</strong></td>
<!--<td width="181" align="center" valign="middle" ><strong>ที่อยู่</strong></td>
<td width="185" align="center" valign="middle" ><strong>อีเมล์</strong></td>-->
</tr>
<?php
$index=1; 
/*if($num>0){*/
//while($row=mysql_fetch_array($query)){ 
foreach($query->result() as $row){

?>
<tr>
<td height="35" align="center" valign="middle" ><?php echo $index++; ?></td>
<td width="200" align="center" valign="middle" ><?php echo $row->rq_subject; ?></td>
<td width="200" align="center" valign="middle" ><?php echo $this->date_time->DateThai($row->rq_date_tor); ?></td>
<td width="200" align="center" valign="middle" ><?php echo 'TOR ข้อ'.$row->ctr_number; ?></td> 
</tr>
<?php
}
/*}*/
?> 
</table>
</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>