<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/hds/prog_bar/css/style.css" media="screen" />
<?php
	$this->load->config('hds_config');
?>
<script>
  $(document).ready(function() 
  {
    $("#tabs").tabs();

    $("#delete_btn").click(function(){
    	confirm("คุณแน่ใจที่จะลบหรือไม่ ?");
    });

  });
  
  $(function() {
    var today = new Date();
    $( "#datepicker_2" ).datepicker({ 
        dateFormat: 'dd/mm/yy',
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });

	$( "#datepicker_3" ).datepicker({ 
        dateFormat: 'dd/mm/yy',
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });
	
    $("#rq_tell").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

  });

</script>
<!-- Timeline styl -->
<style>

    div {
        font-family: Helvetica, Arial, sans-serif;
        box-sizing: border-box;
    }
    .timeline {
        width: 400px;
    }
    .timeline .timeline-item {
        width: 100%;
    }
    .timeline .timeline-item .info, .timeline .timeline-item .year {
        color: #eee;
        display: block;
        float:left;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item.close .info, .timeline .timeline-item.close .year {
        color: #ccc;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item .year {
        font-size: 24px;
        font-weight: bold;
        width: 22%;
    }
    .timeline .timeline-item .info {
        width: 100%;
        width: 78%;
        margin-left: -2px;
        padding: 0 0 40px 35px;
        border-left: 4px solid #aaa;
        font-size: 14px;
        line-height: 20px;
    }
    .timeline .timeline-item .marker {
        background-color: #fff;
        border: 4px solid #aaa;
        height: 20px;
        width: 20px;
        border-radius: 100px;
        display: block;
        float: right;
        margin-right: -14px;
        z-index: 2000;
        position: relative;
    }
    .timeline .timeline-item.active .info, .timeline .timeline-item:hover .info {
        color: #444;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item.active .year, .timeline .timeline-item:hover .year {
        color: #9DB668;
    }
    .timeline .timeline-item .marker .dot {
        background-color: white;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        display: block;
        border: 4px solid white;
        height: 12px;
        width: 12px;
        border-radius: 100px;
        float: right;
        z-index: 2000;
        position: relative;
    }
    .timeline .timeline-item.active .marker .dot, .timeline .timeline-item:hover .marker .dot {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        background-color: #9DB668;
        box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.2);
    }
</style>
<div style="height:400">
	<div class="checkout-wrap">
	  <ul class="checkout-bar">


	    <?php
	    $index = 1;
	    $check_prg = $request->row_array();
	    $active = 0;
	    foreach($status->result() as $rs_st){

	   		switch($rs_st->st_id){ 
	   			case 1: ;
	   			case 2: ;
	   			case 3: ;
	   			case 4: ;
	   			case 8:
			    	if($index == 1)
			    	{
			    		$class = "visited first";
			    		if($rs_st->st_id == $check_prg['rq_st_id'])
			    		{
				    		$active = $index;
			    			$class = "active";
			    		}
			    	}
			    	else if($rs_st->st_id == $check_prg['rq_st_id'])
			    	{	
			    		$active = $index;
			    		$class = "active";
			    	}
			    	else if(($active + 1) == $index){
			    		$class = "next";
			    	}
			    	else if($active == 0)
			    	{
			    		$class = "previous visited";
			    	}
			    	else if($active + 1 < $index)
			    	{
			    		$class = "";
			    	}

			    	echo '<li class="'.$class.'">'.$rs_st->st_name.'</li>';
			    	$index++;

			    	break;
			    	
			    case 5: ;
			    case 6: ;
			    case 7: break;
		    }
	    }
	    ?>
	       
	  </ul>
	</div>
</div>

<div class="clear"></div>
<?php 
	foreach($request->result() as $row1)
	{
		$rq_id = $row1->rq_id;
		$lg_id = $row1->lg_id;
		//$edit = 1;
	}
?>

<br><br><br>
<!-- Detail of request -->
<div class="da-panel">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="<?php echo base_url('images/icons/color/blog.png'); ?>" alt="">
				<b>รายละเอียกคำร้อง </b>
		</span>
		<span class="da-panel-toggler"></span>
	</div>
	<?php
		if($user_edite == false)
		{
	?>
	<div class="da-panel-toolbar top">
        <ul>
            <li><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$rq_id.'/'. 1); ?>"><img src="<?php echo base_url(); ?>images/icons/color/pencil.png" alt="">แก้ไข</a></li>
            <li id="delete_btn"><a href="<?php echo base_url('index.php/HDS/reply/delete_reply/'.$rq_id.'/'.$lg_id); ?>"><img src="<?php echo base_url(); ?>images/icons/color/cross.png" alt="">ลบ</a></li>
            <li><a href=""><img src="<?php echo base_url(); ?>images/icons/color/arrow_redo.png" alt="">รีเฟรช</a></li>
        </ul>
    </div>
    <?php
    	}
    ?>
	<div class="da-panel-content">
	<?php
		$data['class'] ="da-form";
		echo form_open_multipart('HDS/reply/update_reply', $data);
	?>
		<table class="da-table da-detail-view">
			<tbody>
				<?php 
					foreach($request->result() as $row)
					{
				?>
						<input type="hidden" value="<?php echo $row->rq_id; ?>" name="rq_id">
						<input type="hidden" value="<?php echo $row->lg_id; ?>" name="lg_id">
						<tr>
							<th><b>หัวข้อ</b></th>
							<td>
								<?php
									if($edit==0){
										echo " ".$row->rq_subject; 
									}else{
								?>	
									<div class="da-form-inline">
											<div class="da-form-item large">
												<input type="text" value="<?php echo $row->rq_subject; ?>" name="rq_subject">
											</div>
									</div>
								<?php 
									}
								?>
							</td>
							<th><b>ประเภท</b></th>
							<td>
							<?php
								if($edit==0){
									echo " ".$row->ct_name; 
								}else{
							?>
								<div class="da-form-inline">
										<div class="da-form-item large">
										<select name="ct_id">
										<?php
											foreach($ct->result() as $cat){
										?>
												<option value="<?php echo $cat->ct_id; ?>"><?php echo $cat->ct_name; ?></option>
											
										<?php
												}
										?>
										</select>
										</div>
								</div>
							<?php 
								}
							?>
							</td>
						</tr>
						<tr>
							<th><b>หมวด</b></th>
							<td>
							<?php
								if($edit==0){
									echo " ".$row->kn_name; 
								}else{
							?>
								<div class="da-form-inline">
									<div class="da-form-item large">
										<select name="kn_id">
										<?php
											foreach($kn->result() as $kind){
										?>
												<option value="<?php echo $kind->kn_id; ?>">
													<?php
															echo $kind->kn_name;
													?>
												</option>
										<?php
											}
										?>
										</select>
									</div>
								</div>
							<?php 
								}
							?>
							</td>
							<th><b>ระบบ</b></th>
							<td>
							<?php
								if($edit==0){
									echo " ".$row->StNameT; 
								}else{
							?>
								<div class="da-form-inline">
										<div class="da-form-item large">
										<select name="StID">
										<?php
											foreach($syst->result() as $sys){
										?>
												<option value="<?php echo $sys->StID; ?>" <?php if($row->StID == $sys->StID) echo "selected"; ?>>
													<?php
														//if($cat->ct_id == $row->ct_id){
															echo $sys->StNameT;
														//}
													?>
												</option>
											
										<?php
											}
										?>
										</select>
										</div>
								</div>
							<?php 
								}
							?>
							</td>
						</tr>
						<tr>
							<th><b>ระดับความสำคัญ</b></th>
							<td>
							<?php
								if($edit==0){
									echo " ".$row->lv_name; 
								}else{
							?>
								<div class="da-form-inline">
										<div class="da-form-item large">
										<select name="lv_id">
										<?php
											foreach($lv->result() as $lev){
										?>
												
												<option value="<?php echo $lev->lv_id; ?>">
													<?php
														echo $lev->lv_name;
													?>
												</option>
										<?php
											}
										?>
										</select>
										</div>
								</div>
							<?php 
								}
							?>
							</td>
							<th><b>วันที่ส่ง</b></th>
							<td>
							<?php
								echo $this->date_time->DateThai($row->rq_date);
							?>
							</td>
						</tr>
						<tr>
							<th><b>กำหนดส่ง</b></th>
							<td>
							<?php
								if($edit==0){
									echo $this->date_time->DateThai($row->lg_exp);
								}else{
							?>
								<div class="da-form-inline">
									<div class="da-form-item large">
										<input id="datepicker_2" type="text" name="lg_exp" value="<?php echo date('d/m/Y',strtotime($row->lg_exp)); ?>">
									</div>
								</div>
							<?php 
								}
							?>
							</td>
							<th><b>ผู้ส่ง</b></th>
							<td><?php echo" ".$row->UsName; ?></td>
						</tr>
						<tr>
							<th><b>ประมาณการเวลา</b></th>
							<td>
							<?php
								if($edit==0){
									if($row->rq_est_date == NULL){
										echo "ไม่ระบุ";
									}else{
							?>
										<?php echo $this->date_time->DateThai($row->rq_est_date);
									}
								}else{
							?>
									<div class="da-form-inline">
										<div class="da-form-item large">
											<input type="text" name="rq_est_date" id="datepicker_3" 
											value="<?php
												if($row->rq_est_date == NULL){
													echo "ยังไม่ไดระบุ";
												}else{
													echo $this->date_time->DateThai($row->rq_est_date);
												}
											?>">
										</div>
									</div>
							<?php
								}
							?>
							</td>
							<th><b>เวลาที่ส่ง</b></th>
							<td>
							<?php
								if($row->rq_st_id == 6){
									$real_time = $accept->row_array();
									echo $this->date_time->DateThai($real_time['al_date']);
								}else{
									echo "ยังไม่เสร็จสิ้น";
								}
							?>
							</td>
						</tr>
						<tr>
							<th><b>องค์กร</b></th>
							<td colspan="3">
							<?php
								if($edit==0){
									echo " ".$row->dpName; 
								}else{
							?>
								<div class="da-form-inline">
										<div class="da-form-item">
											<select name="dpID">
											<?php
												foreach($dep->result() as $de){
											?>
													
													<option value="<?php echo $de->dpID; ?>" <?php if($de->dpID == $row->dpID) echo "selected"; ?>>
														<?php
															echo $de->dpName;
														?>
													</option>
											<?php
												}
											?>
											</select>
										</div>
								</div>
							<?php 
								}
							?>
							</td>
						</tr>
						<tr>
							<th><b>เมนู</b></th>
							<td colspan="3">
							<?php
								if($edit==0){
									echo " ".$row->rq_menu; 
								}else{
							?>
								<div class="da-form-inline">
									<div class="da-form-item">
										<input type="text" name="rq_menu" value="<?php echo $row->rq_menu; ?>">
									</div>
								</div>
							<?php 
								}
							?>
							</td>
						</tr>
						<tr>
							<th><b>รายละเอียด</b></th>
							<td colspan="3">
							<?php
								if($edit==0){
									echo " ".$row->rq_detail; 
								}else{
							?>
								<div class="da-form-inline">
										<div class="da-form-item large">
											<textarea rows="50" cols="100" name="rq_detail" ><?php echo $row->rq_detail; ?></textarea>
										</div>
								</div>
							<?php 
								}
							?>
							</td>
						</tr>
						<tr>
							<th><b>ไฟล์แนบ</b></th>
							<td colspan="3">
								<ul>
									<?php
										if($file->num_rows() == 0)
										{
											echo "ไม่มีไฟล์";
										} 
										foreach($file->result() as $row1)
										{
									?>
										<div class="da-panel-body">
											<span  class="da-panel-title">
												<img src=<?php echo base_url("images/icons/color/application_put.png"); ?> alt="">
												<a href="<?php echo base_url("index.php/HDS/reply/download/".$row1->fl_name); ?>"><?php echo $row1->fl_name; ?></a>
											</span>
										</div>
									<?php 
										}
									?>
								</ul>
							</td>
						</tr>
						<?php //Loop if else about status of hd_request table.
							if($row->rq_st_id == 2 && $edit == 0 && $user_edite == false)
							{
								echo "	<tr>
											<th colspan='4'>
												<a href = ".base_url('index.php/HDS/dev_work/update_pending/'.$row->rq_id.'/'.$row->rq_sys_id.'/3')."><div class='da-button blue' style='float: right;'>รับทราบ</div></a>
											</th>
										</tr>";
							}
						?>

						<?php
							if($edit==1){
						?>
						<tr>
							<th colspan="4">
								<input type="submit" value="แก้ไขเสร็จสิ้น" class="da-button green" style="float: right;">
							
							</th>
						</tr>
						<?php
							}
						?>
				<?php
					}
				?>
			</tbody>
		</table>
		<?php echo form_close(); ?>
	</div>
</div>


<div class="clear"></div><!-- new line -->

<!-- timeline -->
<div class="da-panel">
	<div class="da-panel-header">
	    <span class="da-panel-title">
	        <img src="<?php echo base_url('images/icons/black/16/speech_bubbles_2.png'); ?>" alt="">
	        Timeline 
	    </span>
	</div>
	<div class="da-panel-content" id="tabs">
	    <ul>
	        <?php 
	        if(isset($develope))
	        {
	        ?>
	        	<li>
	        		<a href="#develope">
		        		<span>
		        			<?php
		        			if($actor == $this->config->item('co_op_id'))
		        			{
		        				echo "ผู้พัฒนาระบบ";
		        			}
		        			else
		        			{
		        				echo "เจ้าหน้าที่ตรวจสอบ";
		        			}
		        			?>
			        	</span>
		        </a>
		    </li>
	       	<?php
	        }
				if(isset($user))
	        {
	        ?>
	        	<li>
	        		<a href="#user">
	        			<span>
		        			<?php
		        			if($actor == $this->config->item('co_op_id'))
		        			{
		        				echo "ผู้ใช้ทั่วไป";
		        			}
		        			else
		        			{
		        				echo "เจ้าหน้าที่ตรวจสอบ";
		        			}
		        			?>
	        			</span>
	        		</a>
	        	</li>
	        <?php
         	}
	        ?>
	    </ul>
        <?php 
        if(isset($develope))
        {
        ?>
		    <div id="develope" style="padding: 0;">
	    		<?php echo $develope; ?>
	    	</div>
       	<?php
        }
    
        if(isset($user))
        {
        ?>
		    <div id="user" style="padding: 0;">
	    		<?php echo $user; ?>

	   	 	</div>
        <?php
     	}
        ?>
	</div><!-- tabs -->
</div><!-- da-panel -->
<!-- Input Box -->
<div class="da-panel" style="display: none;">
	<div class="da-panel-header">
			<span class="da-panel-title">
			<img src=<?php echo base_url("images/icons/black/16/pencil.png"); ?> alt="">
				<b>ส่งข้อความ</b>
		</span>
	</div>
	<div class="da-panel-content">
		
		<?php 
			$data['class']="da-form";
			echo form_open('HDS/reply/insert_reply', $data); 
		?><!--  form action='' method='' class='' > -->
			<input type="hidden" value="<?php //echo $rq_id; ?>" name= "rq_id" />
			<div class="da-form-row">
				<label>ข้อความ</label>
				<div class="da-form-item large">
					<textarea rows="auto" cols="auto" name="rp_detail"></textarea>
				</div>
			</div>
			<div class="da-button-row">
				<input type="reset" value="Reset" class="da-button gray left">
				<input type="submit" value="ส่งข้อความ" class="da-button green">
			</div>
		<?php
			echo form_close();
		?>	
	</div>
</div>
