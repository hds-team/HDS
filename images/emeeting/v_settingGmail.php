
<?php 
	$rm =(isset($rs_m))? $rs_m->row() : null;
	$action = "set_mail_internal";
?>
 <script type="text/javascript">
$(document).ready(function()
{
   $('span[title].subindex').qtip({
      position: {
         corner: {
            target: 'topRight',
            tooltip: 'bottomLeft'
         }
      },
      style: {
	 
         name: 'cream',
         padding: '7px 13px',
         width: {
            max: 210,
            min: 0
         },
         tip: true
      }
   });
});
</script>
			<script type="text/javascript">
			
				function validate(form_id,email) {
				   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				   var address = $("#email").val();
				   if(reg.test(address) == false) {
				 
					  alert('Invalid Email Address');
					  return false;
				   }else{
							if(($("#password").val() != $("#repassword").val()) || $("#password").val()==""){
								alert('Invalid Password or Re-password');
								return false;
							}
				   }
				}
			
			</script>
<form method="post" id="form_mail" action="<?php echo $action;?>" autocomplete="off" Onsubmit="javascript:return validate('form_mail','mail');">
<input name="cgm_id" value="<?php echo emt_getval('cgm_id', $rm);?>" type="hidden" />

	<div class="grid_4_center">
        <div class="da-panel">
            <div class="da-panel-header">
                <span class="da-panel-title">
				<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/message.png";?> />
                                        ตั้งค่า gmail
                </span>
            </div>
	<div class="da-panel-content">
	<table class="da-table da-detail-view">
		<tbody>
			<tr>
				<th align="right"><label>E-mail</label></th>
			
				<td width="70%">
			
				<!-- <span href="" class="subindex" title="กรุณากรอก E-mail   เพื่อใช้ในการส่งข้อมูลไปยัง E-mail ของท่าน"> -->
					<input class="validate" title="กรุณากรอก E-mail เพื่อใช้ในการส่งข้อมูลไปยัง E-mail ของท่าน" type="text" name="email" id="email" value="<?php echo emt_getval('cgm_email', $rm);?>" size="30" />
				<!-- </span> -->
				</td>
			</tr>
			<tr>
				<th><label>รหัสผ่าน </label></th>
				
				<td>
				<!--<span href="" class="subindex" title="กรุณากรอกรหัสผ่านของ E-mail ของท่าน เพื่อใช้ในการยืนยันอีเมล์">-->
				<input class="validate" title="กรุณากรอกรหัสผ่านของ E-mail ของท่าน เพื่อใช้ในการยืนยันE-mail" type="password" name="password" id="password" value="<?php echo emt_getval('cgm_password', $rm);?>"  size="30"/>
				<!--</span> -->
				<span class="red">*</span>
				</td>
			</tr>

			<tr>
				<th><label>ยืนยันรหัสผ่าน </label></th>
				
				<td>
				<!-- <span href="" class="subindex" title="กรุณากรอกยืนยันรหัสผ่าน E-mail ของท่าน เพื่อยืนยันรหัสผ่านอีกครั้ง"> -->
				<input class="validate" title="กรุณากรอกยืนยันรหัสผ่าน E-mail ของท่าน เพื่อยืนยันรหัสผ่านอีกครั้ง" type="password" name="repassword" id="repassword" value="<?php echo emt_getval('cgm_password', $rm);?>"  size="30"/>
				<!-- </span> -->
				<span class="red">*</span>
				</td>
			</tr>
			<tr>
				<th><label>SMS</label></th>
				
				<td>
				<!-- <span href="" class="subindex" title="ส่วนนี้ใช้สำหรับกำหนดการส่ง SMS ตามปฏิทินข้อมูลของวันนั้นๆ "> -->
				<input title="กำหนดการส่ง SMS ตามปฏิทินข้อมูลของวันนั้นๆ" type="checkbox" <?php if(emt_getval('cgm_sms_status', $rm)=="Y"){echo "checked";}?> name="sms" id="sms" value="Y" />
				<!-- </span> -->
				</td>
			</tr>
			<tr>
				<th><label>เวลาแจ้งเตือน SMS / นาที </label></th>
				
				<td>
				<!--- <span href="" class="subindex" title="กำหนดช่วงเวลาการแจ้งเตือนทางSMSว่าจะให้แจ้งเตือนเป็นเวลาเท่าไหล่ก่อนถึงเวลากำหนดในการประชุม โดนมีตัวอย่างรูปแบบดังนี้ เช่น 1:50 , 2:59 , 1:00 "> -->
				<input placeholder="1:50 or 2:59" class="validate" title="กำหนดช่วงเวลาการแจ้งเตือนทางSMSว่าจะให้แจ้งเตือนเป็นเวลาเท่าไหล่ก่อนถึงเวลากำหนดในการประชุม โดนมีตัวอย่างรูปแบบดังนี้ เช่น 1:50 , 2:59 , 1:00" 
				type="text" name="notice_time" id="notice_time" value="<?php echo emt_getval('cgm_notice_time', $rm);?>"  size="10"/>
				<!-- </span> -->
				<span class="red">*</span>
				</td>
			</tr>
			<tr>
			<div class="da-button-row">
				<td colspan="3">
					
					<input type="reset" name="btnClear" id="btnClear" value="เคลียร์ค่า" class="da-button gray left" />
				<div class="da-button-row" align="right">	
					<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึก" class="da-button green" />
				</div>	
				</td>
			</div>	
			</tr>
		</tbody>
	</table>
		</div>
			<br/>
		</div>
	</div>


<?php echo form_close();?>