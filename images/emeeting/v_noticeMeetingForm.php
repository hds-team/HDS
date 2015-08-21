<?php
	$pic = '';
	$header = 'บันทึกข้อความ';
	$div = 'ส่วนราชการ';
	$no = 'ที่';
	$date = 'วันที่';
	$subject = 'เรื่อง';
	$to = 'เรียน';
	$num_th = $this->config->item('emt_cv_th');
	//$complimentary_close = "ขอแสดงความนับถือ";
?>
<style type="text/css">
	.emt-tab{padding-right:30px;}
	.emt-bottom-tab{padding-bottom:10px;}
	.emt-paragraph{padding-left:50px;}
	.pagebrake {
		page-break-before:always;
	}
</style>
<?php
foreach($qu_ivm->result() as $row)
{
?>
<div style="font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';">
	<p style="text-align:left;tab-stops:6.5cm;">
		<span><img src="<?php echo base_url().$this->config->item('emt_form_garuda');?>" width="60" height="60" class="noborder"/></span>
		<span style="mso-tab-count:1;"></span>
		<span class="emt_bold" style="padding-left:250px;font-size:24.0pt;"><?php echo $num_th($header);?></span>
	</p>
	<p style="text-align:left;tab-stops:7.5cm;">
		<span class="emt_bold"><?php echo $div;?></span>
		<span><?php echo $num_th($row->ivm_div)." ".$num_th($exPhone);?></span>
		<br/>
		<span class="emt_bold"><?php echo $no;?></span>
		<span><?php echo $num_th($row->ivm_no);?></span>
		<span style="mso-tab-count:1;"></span>
		<span class="emt_bold" style="padding-left:300px;"><?php echo $date;?></span>
		<span><?php echo th_date($row->ivm_date,'\/|-',1);?></span>
		<br/>
		<span class="emt_bold"><?php echo $subject;?></span>
		<span><?php echo $num_th($row->ivm_subject);?></span>
	</p>
	
	<p style="text-align:left;">
		<span class="emt_bold"><?php echo $to;?></span>
		<span><?php echo $num_th($row->ivm_to);?></span>
	</p>
	<p style="text-align:left;">
		<span class="emt-tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<span class="emt-bottom-tab"><?php echo $num_th($row->ivm_p1);?></span>
	</p>
	<p style="text-align:left;">
		<?php $x=1;?>
		<span class="emt-bottom-tab"><?php re_viewAgdtN($rs_agdt, $x);?></span>
	</p>
	<p style="text-align:left;">
		<span class="emt-tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<span class="emt-bottom-tab"><?php echo $num_th($row->ivm_p3);?></span>
	</p>
	<p>
		<br/>
	</p>
	<!--<p style="text-align:left;tab-stops:7.5cm;">
		<span style="mso-tab-count:1;"></span>
		<span style="padding-left:350px;"><?php //echo $complimentary_close;?></span>
	</p>-->
	<!--<p style="text-align:left;tab-stops:7.5cm;">
		<span style="mso-tab-count:1;"></span>
		<span style="padding-left:450px;">(<?php echo $secretary; ?>)</span><br />
		<span style="mso-tab-count:1;"></span>
		<span style="padding-left:450px;"><?php echo $position; ?></span><br />
		<span style="mso-tab-count:1;"></span>
		<span style="padding-left:450px;"><?php echo $agency; ?></span>
	</p>-->
	<p style="text-align:center;tab-stops:7.5cm;margin-left:300px;">
		<span>(<?php echo $secretary; ?>)</span>
		<?php if($position){ ?>
			<br /><span><?php echo $position; ?></span>
		<?php } ?>
		<br /><span><?php echo $agency; ?></span>
	</p>
	<!--<table style="font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';text-align:center;tab-stops:7.5cm;margin-left:380px;">
		<tr><td>(<?php echo $secretary; ?>)</td></tr>
		<tr><td><?php echo $position; ?></td></tr>
		<tr><td><?php echo $agency; ?></td></tr>
	</table>-->
</div>
<div class="pagebrake"><br style="height:0; line-height:0"></div>

<?php
}

function re_viewAgdtN($child, &$num){	
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$no_send = "";
	$agdt_parent = "";
	
	echo "<table border=\"0\" style=\"font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
	foreach($child->result() as $row_child){
		if($row_child->agdt_level < 2){
			if($row_child->agdt_level > 0){	
				echo "<tr>";
				echo "<td valign=\"top\" align=\"right\" width=\"60\">" . al_to_th($num) . ".</td>";
				echo "<td>" . $row_child->agdt_head . "</td>";
				echo "</tr>";	
				
				$num++;
			}
		}
		if($row_child->child->num_rows()>0){
			re_viewAgdtN($row_child->child, $num);
		}
	}
	echo "</table>";
}
?>

