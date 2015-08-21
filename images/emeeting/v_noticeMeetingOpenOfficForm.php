<?php
	$pic = '';
	$header = 'บันทึกข้อความ';
	$div = 'ส่วนงาน';
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
		<div style="float:left;"><img src="<?php echo base_url().$this->config->item('emt_form_garuda');?>" width="60" height="60" class="noborder" /></div>
		<span style="font-weight:bold;margin-left:250px;font-size:24.0pt;"><?php echo $num_th($header);?></span>
	</p>
	<p style="text-align:left;tab-stops:7.5cm;">
		<span style="font-weight:bold;"><?php echo $div;?></span>
		<span><?php echo $num_th($row->ivm_div)." ".$num_th($exPhone);?></span>
		<br />
		<span style="font-weight:bold;"><?php echo $no;?></span>
		<span><?php echo $num_th($row->ivm_no);?></span>
		<span style="mso-tab-count:1;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
		<span style="font-weight:bold;"><?php echo $date;?></span>
		<span><?php echo th_date($row->ivm_date,'\/|-',1);?></span>
		<br />
		<span style="font-weight:bold;"><?php echo $subject;?></span>
		<span><?php echo $num_th($row->ivm_subject);?></span>
	</p>
	
	<p style="text-align:left;">
		<span style="font-weight:bold;"><?php echo $to;?></span>
		<span><?php echo $num_th($row->ivm_to);?></span>
	</p>
	<p style="text-align:left;">
		<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<span style="margin-bottom:10px;"><?php echo $num_th($row->ivm_p1);?></span>
	</p>
	<p style="text-align:left;">
		<?php 
			$x = 1;
		?>
		<span style="margin-bottom:10px;margin-left:1.25cm;"><?php re_viewAgdtN($rs_agdt, $x);?></span>
	</p>
	<p style="text-align:left;margin-left:1.25cm;">
		<span><?php echo $num_th($row->ivm_p3);?></span>
	</p>
	<p>
		<br />
	</p>
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
<p style="page-break-before:always;"><br style="height:0px;line-height:0px;" /></p>

<?php
}

function re_viewAgdtN($child, &$num){	
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$no_send = "";
	$agdt_parent = "";
	
	echo "<table border=\"0\">";
	foreach($child->result() as $row_child){
		if($row_child->agdt_level < 2){
			if($row_child->agdt_level > 0){	
				echo "<tr>";
				echo "<td valign=\"top\" nowrap=\"nowrap\"><span style=\"font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">" . al_to_th($num) . ".</span></td>";
				echo "<td><span style=\"font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">" . $row_child->agdt_head . "</span></td>";
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