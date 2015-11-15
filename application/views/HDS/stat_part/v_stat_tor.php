<?php
	$this->load->config('hds_config');
?>
<script>
	$(document).ready(function(){
	    //------ Add for thai date
	    var d = new Date();
	    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);

	    $( ".datepicker" ).datepicker({ 
	    	dateFormat: 'dd/mm/yy',
	    	changeMonth: true,
			changeYear: true,
			isBuddhist: true,
			defaultDate: toDay,
			dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
			dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
			monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
			monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'],
	        onSelect: function(date) {

            	//------ Date format
	        	var date_tor = $(this).val().split("/").reverse().join("-");
	        	console.log(date_tor);

	        	//------ Get ID
            	var rq_id = $(this).attr('id');

            	//------ Set url 
            	url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/update_date_tor')?>"+"/"+rq_id+"/"+date_tor;

  				console.log(url);
            	//------ Update data
            	$.get(url, function(data){
            		// Not Respon
            		console.log(data);

	            	if(data == "TRUE")
		        	{
		        		//------ Remove Style of row
		            	var tr = $("#tor_number_"+rq_id).closest('tr');
			            	tr.removeAttr('style');
			            	tr.find("td:nth-child(1)").removeAttr('style');
			            	$(this).parent('tr').css('color: red;');
		            }
            	});
				
        	}

	    });

	    $( "#tor_dialog" ).dialog({
	        autoOpen: false,
	        resizable: false,
	        modal: true,
	        width: 500,
	        buttons: {
		        Ok: function() {
		        	var rq_id = $("#rq_id").val();
		        	var ctr_id = $("#ctr_id").val();
		        	var url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/update_tor')?>"+"/"+rq_id+"/"+ctr_id;
		        	//console.log(url);
		        	$.get(url, function(data){
		        		//No respon
		        		//------ Replace text tor number
		        		$("#tor_number_"+rq_id).html("TOR ข้อ"+data);

		            	//------ Remove Style of row
		            	console.log($("#tor_number_"+rq_id).html());
		            	console.log($("#"+rq_id).val());
		            	if($("#tor_number_"+rq_id).html() != "" && $("#"+rq_id).val() != "")
		            	{
			            	var tr = $("#tor_number_"+rq_id).closest('tr');
				            	tr.removeAttr('style');
				            	tr.find("td:nth-child(1)").removeAttr('style');
			            }
		        	});
		        	$( this ).dialog("close");
		        },
		       	Cancel: function() {
		          $( this ).dialog("close");
		        }
	      	}
	    });

	    $(".edit_tor").click(function(){
	    	//--------- check tor
	    	var rq_id = $(this).attr('data-id');
	    	var url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/check_tor')?>"+"/"+rq_id;
	    	//console.log(url);
	    	$.get(url, function(data){
	    		if(data != "FALSE")
	    		{
	    			url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/default_tor')?>"+"/"+rq_id;
			    	$.getJSON(url, function(data_i){
			    		//console.log(data_i);
			    		$('#proj_id').val(data_i.tp_id);
    		           	url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/get_tor_contract')?>"+"/"+data_i.tp_id;
				    	$.getJSON(url, function(data_j){
				    		//console.log(data);
			    			$("#ctr_id").empty();
			    			var tag;
				    		for(var i=0; i < data_j.id.length; i++)
				    		{
				    			if(data_j.id[i] == data_i.ctr_id)
				    			{
				    				tag = "<option selected></option>";
				    			}
				    			else
				    			{
				    				tag = "<option></option>";
				    			}
				    			$("#ctr_id").append($(tag).val(data_j.id[i]).html(data_j.number[i]+" "+data_j.value[i]));
				    		}

	    				});
	    				$("#contract_blog").removeAttr('style');
			    	});
	    		}
	    		else
	    		{
	    			$('#proj_id').val(0);
	    			$("#contract_blog").hide();
	    		}
	    	});


	    	$("#rq_id").val($(this).attr('data-id'));
	    	$("#tor_dialog").dialog( "open" );
	    });

	    $("#proj_id").change(function(){
	    	var proj_id = $(this).val();
           	url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/get_tor_contract')?>"+"/"+proj_id;
          	console.log(url);
	    	$.getJSON(url, function(data){
	    		//console.log(data);
    			$("#ctr_id").empty();
	    		for(var i=0; i < data.id.length; i++)
	    		{
	    			$("#ctr_id").append($("<option></option>").val(data.id[i]).html(data.number[i]+" "+data.value[i]));
	    		}

	    	});
	    	$("#contract_blog").removeAttr('style');
	    });


	    
	});
</script>
<style>
	.center{
		text-align: center;
	}
</style>
<div class="da-panel collapsible">
	<div class="da-panel-header">
    	<span class="da-panel-title">
            <img src=<?php echo base_url("images/icons/black/16/list.png"); ?> alt="">
				<b>รายงานสัญญาระหว่าง User</b>
        </span>
        <span class="da-panel-toggler"></span>
    </div>
    <div class="da-panel-content">
        <table id="da-ex-datatable" class="da-table">
            <thead>
                <tr>
                    <th style="width: 7%" class="center"><b>ลำดับ</b></th> 
                    <th class="center"><b>กิจกรรม</b></th>
                    <th class="center"><b>รายละเอียด</b></th>
                    <th style="width: 11%" class="center"><b>วันที่จริง</b></th>
                    <th style="width: 11%" class="center"><b>วันที่ตามสัญญา</b></th> 
                    <th style="width: 20%" class="center"><b>หมายเหตุ</b></th> 
                </tr>
            </thead>
            <tbody>
				<?php 
					$index=1;
					foreach($query->result() as $row)
					{
				?> 
					<tr style="<?php if($row->rq_date_tor == NULL || $row->ctr_number == NULL) echo " color: red;"; ?>">
						<td class="center" style="<?php if($row->rq_date_tor == NULL || $row->ctr_number == NULL) echo "color: red;"; ?>"><?php echo $index++; ?></td>
						<td ><?php echo $row->rq_subject; ?></td>
						<td class="center"><a target="_blank" href="<?php echo base_url('index.php/'.$this->config->item('sys_name').'/reply/detail_sys/'.$row->rq_id); ?>"><img src=<?php echo base_url("images/icons/color/magnifier.png"); ?> alt=""></a></td>
						<td class="center"><?php echo $this->date_time->DateThai($row->rq_date); ?></td>
						<td class="center">
							<form class="da-form">
		                        <input type="text" class="datepicker" id="<?php echo $row->rq_id; ?>" 
		                        		value="<?php if($row->rq_date_tor != NULL) echo $this->date_time->date_textbox($row->rq_date_tor); ?>" 
		                        		placeholder="ไม่ระบุ"
		                        >
		                    </form>
                        </td>
						<td class="center">
							<p id="tor_number_<?php echo $row->rq_id; ?>" style="display:inline">
							<?php 
								if($row->ctr_number)
								{
									echo 'TOR ข้อ'.$row->ctr_number;
								}
								else
								{
									echo "ไม่ระบุ";
								}
							?>
							</p>
							<img class="edit_tor" data-id = "<?php echo $row->rq_id; ?>" style="float: right; cursor: pointer;" src=<?php echo base_url("images/icons/color/pencil.png"); ?> title="แก้ไข TOR">
						</td>
					</tr>
				<?php 
					} 
				?>
            </tbody>
        </table>
    </div> <!--  class="da-panel-content -->
</div> <!-- class="da-panel collapsible -->
<a href = "<?php echo base_url('index.php/HDS/stats/export_pdf/')?>" />
			<button style="width:10%" class="da-button blue">Export</button>
</a>

<!-- HDS Dialog Report -->
<div id = "tor_dialog" class="da-panel-content" title="กำหนดข้อสัญญา" style="padding: 0px; display: none;">
	<?php 
		$data['class'] ="da-form";
		$data['id'] ="confirm_form";
		echo form_open($this->config->item('sys_name').'/reply/insert_reply', $data); 
	?>
	<input id="rq_id" type="hidden">
	<div class="da-form-row">
		<label>โครงการ</label>
		<div class="grid_4" align="center">
			<select id="proj_id">
				<option>เลือกโครงการ</option>
				<?php
					if($proj->num_rows() == 0)
					{
						echo "ไม่พบข้อมูลโครงการ";
					}

					foreach($proj->result() as $proj_rs)
					{
				?>
					<option value="<?php echo $proj_rs->tp_id;?>"><?php echo $proj_rs->tp_name; ?></option>
				<?php
					}
				?>
			</select>
		</div>
	</div>
	<div class="da-form-row" style="display: none;" id="contract_blog">
		<label>ข้อสัญญา</label>
		<div class="grid_4" align="center">
			<select id="ctr_id">
			</select>
		</div>
	</div>
  	<?php 
  		echo form_close(); 
  	?>
</div>