<script language="javascript">
function fncAlert()
{
	document.getElementById("check");
	alert('ท่านยังไม่ได้ใส่ผู้ร่วมการประชุม');
	parent.$.fancybox.close();
}

</script>
<?php
	echo link_tag('css/emt_css/emt_css.css');
	$pic = '';
	$header = 'บันทึกข้อความ';
	$div = 'ส่วนงาน';
	$no = 'ที่';
	$date = 'วันที่';
	$subject = 'เรื่อง';
	$to = 'เรียน';
	$num_th = $this->config->item('emt_cv_th');
	$complimentary_close = "ขอแสดงความนับถือ";
	
?>
<?php if($qu_ivm->row() != null){?>
<div class="emt_bold" align="center">[ตัวอย่างหนังสือเชิญ]</div>
<br/>
<div style="font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';padding:25px;border:1px solid #DDD;">
	<p style="text-align:left;tab-stops:6.5cm;">
		<span><img src="<?php echo base_url().$this->config->item('emt_form_logo');?>" width="60" height="60" class="noborder"/></span>
		<span style="mso-tab-count:1;"></span>
		<span class="emt_bold" style="padding-left:250px;font-size:24.0pt;"><?php echo $num_th($header);?></span>
	</p>
	<p style="text-align:left;tab-stops:7.5cm;">
		<span class="emt_bold"><?php echo $div;?></span>
		<span><?php echo $num_th($qu_ivm->row()->ivm_div)." ".$num_th($exPhone);?></span>
		<br/></br>
		<span class="emt_bold"><?php echo $no;?></span>
		<span><?php echo $qu_ivm->row()->ivm_no;?></span>
		<span style="mso-tab-count:1;"></span>

		<span class="emt_bold" style="text-align:center;tab-stops:7.5cm;margin-left:475px;">
		<?php echo $date;?></span>
		<span><?php echo th_date($qu_ivm->row()->ivm_date,'\/|-',1);?></span>
	</p>
	<p style="text-align:left;">
		<span class="emt_bold"><?php echo $subject;?></span>
		<span><?php echo $qu_ivm->row()->ivm_subject;?></span>
	</p>
	<p style="text-align:left;">
		<span class="emt_bold"><?php echo $to;?></span>
		<span><?php echo "...............";?></span>
	</p>

	<p style="text-align:left;">
		<span class="emt-tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<span class="emt-bottom-tab"><?php echo $qu_ivm->row()->ivm_p1;?></span>
	</p>
	<p style="text-align:left;">
		<span class="emt-bottom-tab"><?php re_viewAgdtM($rs_agdt, 0);?></span></br>
		<br/>
	</p>
	<p style="text-align:left;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';">
		<span class="emt-tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<span class="emt-bottom-tab"><?php echo $qu_ivm->row()->ivm_p3 ?></span>
	</p>
	<p>
		<br/>
	</p>
	<?php } else { 
	?> 	
	<div id="check" onclick="fncAlert();">
	<div class="emt_bold" align="center">[ตัวอย่างหนังสือเชิญ]</div>
<br/>
<div style="font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';padding:25px;border:1px solid #DDD;">
	<p style="text-align:left;tab-stops:6.5cm;">
		<span><img src="<?php echo base_url().$this->config->item('emt_form_logo');?>" width="60" height="60" class="noborder"/></span>
		<span style="mso-tab-count:1;"></span>
		<span class="emt_bold" style="padding-left:250px;font-size:24.0pt;"><?php echo $num_th($header);?></span>
	</p>
	<p style="text-align:left;tab-stops:7.5cm;">
		<span class="emt_bold"><?php echo $div;?></span>
		<span><?php echo "ยังไม่มีข้อมูล"." ".$num_th($exPhone);?></span>
		<br/></br>
		<span class="emt_bold"><?php echo $no;?></span>
		<span><?php echo "ยังไม่มีข้อมูล";?></span>
		<span style="mso-tab-count:1;"></span>

		<span class="emt_bold" style="text-align:center;tab-stops:7.5cm;margin-left:475px;">
		<?php echo $date;?></span>
		<span><?php echo "ยังไม่มีข้อมูล";?></span>
	</p>
	<p style="text-align:left;">
		<span class="emt_bold"><?php echo $subject;?></span>
		<span><?php echo "ยังไม่มีข้อมูล";?></span>
	</p>
	<p style="text-align:left;">
		<span class="emt_bold"><?php echo $to;?></span>
		<span><?php echo "ยังไม่มีข้อมูล";?></span>
	</p>

	<p style="text-align:left;">
		<span class="emt-tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<span class="emt-bottom-tab"><?php "ยังไม่มีข้อมูล";?></span>
	</p>
	<p style="text-align:left;">
		<span class="emt-bottom-tab"><?php echo"ยังไม่มีข้อมูล";?></span></br>
		<br/>
	</p>
	<p style="text-align:left;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';">
		<span class="emt-tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<span class="emt-bottom-tab"><?php echo "ยังไม่มีข้อมูล"; ?></span>
	</p>
	<p>
		<br/>
	</p>
	</div>
	</div>
	<?php
	}
	?>
	<?php
	//if(isset($secretary)){ 
	if($secretary!=null) {?>
  <p style="text-align:center;tab-stops:7.5cm;margin-left:300px;">
		<span style="mso-tab-count:1;"></span>
		<span>(<?php echo $secretary; ?>)</span>
		<?php if($position){ ?>
			<br /><span style="mso-tab-count:1;"></span>
			<span><?php echo $position; ?></span>
		<?php } ?>
		<br /><span style="mso-tab-count:1;"></span>
		<span><?php echo $agency; ?></span>
	</p>
</div>
	<?php } else {?>
	  <p style="text-align:center;tab-stops:7.5cm;margin-left:300px;">
		<span style="mso-tab-count:1;"></span>
		<span>(<?php echo "ยังไม่มีผู้เข้าร่วม"; ?>)</span>
		<?php if($position){ ?>
			<br /><span style="mso-tab-count:1;"></span>
			<span><?php echo $position.""; ?></span>
		<?php } ?>
		<br /><span style="mso-tab-count:1;"></span>
		<span><?php echo $agency.""; ?></span>
	</p>
</div>
	<?php } ?>
<br/>
<div align="center">
	<?php
		$action = "noticeMeeting/noticePreviewEdit";
		echo form_open($this->config->item("emt_path").$action);
	?>
		<input type="hidden" name="mt_id" value=<?php echo $mt_id;?> />
		<input type="submit" name="submit" id="submit" value="แก้ไขหนังสือเชิญ" />
	<?php
	echo form_close();
	?>
</div>