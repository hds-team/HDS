				<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/showUserAdd.js"></script>
				<script type="text/javascript"> $(function() { $("#tabs").tabs(); }); </script>
				<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/permission.js"></script>
<script type="text/javascript">
function removeuser(UsID)
{
	var web="<?php echo base_url(); ?>index.php/UMS/showUser/remove/"+UsID;
	if(confirm("คุณต้องการลบหรือไม่?")==true){
     window.location.href=web;
   }
	else
	{
		return false;
	}
}	
</script>
<script>
// this version add user one by one
var running_user = new Array();
function sync(){
	var jqxhr = $.get( "syncHR/search", function() {//alert( "success" );
	})
	.done(function(data) {
		$("#sync_table").html(data);
		$("#sync_form").fadeIn('slow');
		$(".da-button-row").show();
		check_all_user();
	})
	.fail(function() { alert( "error" );
	})
	.always(function() {//alert( "finished" );
	});
}
function check_all_user(){
	var sync_table = document.getElementById("sync_table");
	var row = sync_table.rows.length;
	$('.check').each(function(){
		valid(this);
	});
	
}
function clear_data(){
	$(".da-button-row").hide();
	var Parent = document.getElementById("sync_table");
	while(Parent.hasChildNodes())
	{
		Parent.removeChild(Parent.firstChild);
	}
	var row = document.getElementById("sync_table").insertRow();
	row.setAttribute("align","center");
	var cell = row.insertCell();
	cell.setAttribute("colspan",4);
	cell.innerHTML = "-- Empty --";
}
function delete_row(e){
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
	alert("Delete Complete");
}
function valid(e){
	var username = $(e).parent().children(".user").val();
	if(username.length > 4)
	{
		var url = "syncHR/check_username/"+username;
		var jqxhr = $.get( url, function() {//alert( "success" );
		})
		.done(function(data) {
			if(data==1){//usable
				var count=0;
				for(var i = 0 ; i < running_user.length;i++)
				{
					if(username == running_user[i])
					{
						count++;
					}
				}
				if(count==0){
					running_user.push(username);
					$(e).parent().children(".user").css("border","none");
					$(e).parent().children("b").remove();
					$(e).parent().append("<b style='color:green;' >ok!</b>");
					$(e).remove();
					
				}
				else{
					$(e).parent().children("b").remove();
					$(e).parent().append("<b style='color:red;' >can't use!</b>");
				}
				
			}else{// can't use
				$(e).parent().children("b").remove();
				$(e).parent().append("<b style='color:red;' >can't use!</b>");
			}
		})
		.fail(function() { alert( "error" );
		})
		.always(function() {//alert( "finished" );
		});
	}
	else if(username.length==0)
	{
		$(e).parent().children("b").remove();
		$(e).parent().append("<b style='color:red;' >Can't Empty!!</b>");
	}
	else
	{
		$(e).parent().children("b").remove();
		$(e).parent().append("<b style='color:red;' >Too Short!!</b>");
	}
}
</script>				
				<!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<div id="da-content-area">
						<div class="grid_1_center">
						   <div class="da-panel-widget">
							  <ul class="da-summary-stat">
								 <li>
									<a href="#" onClick="sync()">
									<span class="da-summary-icon" style="background-color:#ea799b;">
									<img src="<?php echo base_url();?>images/icons/white/32/magnifying_glass.png" alt="ข้อมูลประวัติ" />
									</span>
									<span class="da-summary-text">
									<span class="value">Sync</span>
									</span></br>
									</a>
								 </li>
							  </ul>
						   </div>
						</div>
						
						
                	<!-- Content Area -->
<div id="sync_form" style="display:none" >
                    	<div class="grid_4_center">
                        	<div class="da-panel ">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/32/users_2.png" alt="" />
                                        รายชื่อผู้ใช้ 
                                    </span>
                                    
                                </div>
								
                                <div class="da-panel-content">
									<form class="da-form" method="post" action="<?php echo base_url(); ?>index.php/UMS/syncHR/syncing" >
										
										  
									   
										<table id="da-ex-datatable" class="da-table">
											<thead>
												<tr>
													<th width="25%">ชื่อ-นามสกุล</th>
													<th width="25%">E-Mail</th>
													<th width="20%">ชื่อเข้าใช้ระบบ</th>
													<th width="7%">ดำเนินการ</th>
												</tr>
											</thead>
											<tbody id="sync_table">
												<tr><td colspan="4">Empty Data To Sync</td>
												</tr>

											</tbody>										
										</table>	
										<div class="da-button-row">
											<input id="clear" class="da-button gray left" type="reset" value="เคลียร์ข้อมูล" name="clear" onclick="clear_data()"></input>
											<input id="submit" class="da-button green" type="submit" value="บันทึก" name="submit"></input>
											<input id="cancel" class="da-button red" type="button" onclick="window.location.href=''" value="ยกเลิก" name="cancle"></input>
										</div>
									</form>
                                </div>								
                            </div>
                        </div>
						
</div>			
                    </div>
                    
                </div>



