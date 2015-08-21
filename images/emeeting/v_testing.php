<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/css/jquery.ui.all.css" media="screen" />

<!-- Validation Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.ui.js"></script>
<script language="javascript">

</script>
	<div class="grid_3_center">
	<div class="da-panel collapsible collapsible_fshow"> <!--ตารางค้นหาข้อมูล-->
		<div class="da-panel-header">
			<span class="da-panel-title">
				<!--img alt="" src="<?php echo base_url().$this->config->item("pp_dandelion");?>images/icons/black/16/magnifying_glass.png"-->
					ค้นหาการประชุมในแต่ละช่วงเวลา
			</span>
		</div>
		<?php $action = "announceMeeting/Showjack"; ?>
		<?php echo form_open($this->config->item("emt_path").$action); ?>
				<div class="da-panel-content">
                    <form class="da-form">
                     <table class="da-table da-detail-view">
                     <tbody>
					 <?php $check_start_date = getNowDateBuddishTH(); ?>
					 <?php $check_end_date = getNowDateBuddishTH(); ?>
                                        	<tr>
                                            <th>กำหนดตั้งแต่</th>
											<td width="70%">
											<input type="text" name ="check_start_date" class="da-ex-datepicker-week" style='width:100px' value='<?php echo $check_start_date; ?>'readonly />
											<span class="red">*</span>
											</td>
                                            </tr>
	                                        <tr>
                                            	<th>ถึงวันที่</th>
                                            <td>
											<input type="text" name ="check_end_date" class="da-ex-datepicker-week" style='width:100px' value='<?php echo $check_start_date; ?>'readonly />
											<span class="red">*</span>
											</td>
                                            </tr> 
					 </tbody>
					</table>
                <div class="da-button-row" align="right">
				<input class="da-button gray left" type="reset" value="เคลียร์ข้อมูล">
				<input style="margin-left:15px; width:80px;" class="da-button blue" type="submit" id="btnSearch" name="btnSearch" value="ค้นหา" />
				</div>  			
			<?php echo form_close();?>
			   </div>
			</div> 
		</div>
		<div>
		<h2>ส่วนของกราฟ</h2>
		</div>
		</br>
		<div>
		<h2>ส่วนของการประชุุม</h2>
		<?php 
		//print_r($testing->result()); 
	?>	
	<div class="grid_4_center">
        <div class="da-panel collapsible">
            <div class="da-panel-header">
                <span class="da-panel-title">
                    <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/list_w_image.png"; ?> />
							รายการการประชุม  <span class="note" ></span>
                </span>
                                    
            </div>
            <div class="da-panel-content">
         <table style="width:100%;" align="center" id="da-ex-datatable-default" class="da-table">
			<thead>
				<tr>
					<th width="70">
						ลำดับ
					</th>
					<th>
						รายการ การประชุม
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$show_row = 0;
					$url = site_url() . "emeeting/announceMeeting/";
					//$urlAdd = $url . "commissionAdd";
					//$urlEdit = $url . "commissionEdit";
					//$urlDel = $url . "commissionDel";
					$urlView = $url . "ShowMeeting";
					if(isset($testing)){
					foreach($testing->result() as $key => $row_cms ){
					$post = "cms_id:'" . $row_cms->cms_id ."'";
					$show_row = 1;
				?>
					<tr>
						<td align="center">
							<?php echo ($key+1); ?>
						</td>
						<td style="padding-left:15px;">
							<?php echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlView}','','');\" title=\"ดูรายละเอียดการประชุมหลัก\">{$row_cms->cms_name} ประจำปี {$row_cms->cms_year}</a>\n"; ?>
						</td>
					</tr>
				<?php
					}
					}
					else{
					?>
					<tr>
						<td align="center">
						</td>
						<td style="padding-left:15px;" class="red">
							<?php echo "กรุณาใส่เวลาที่จะค้นหา" ?>
						</td>
					</tr>
				<?php
					}
					
					/*if($show_row == 0)
					{
				?>
						<tr>
							<td colspan="2" align="center" class='red'>
								***ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ***
							</td>
						</tr>
				<?php
					}
				} else {
				?>
					<tr>
						<td colspan="2" align="center" class='red'>
							***ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ***
						</td>
					</tr>
				<?php
				} */
				?>
											</tbody>
								</table>
						</div>
				</div>
		</div>
		</div>
		<div><span style="padding-right:130px;">&nbsp;</span> </div>
		