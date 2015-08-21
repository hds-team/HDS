<script type='text/javascript'> 
$(document).ready(function() {
	$("#btnsubmit").click(login);
	function login() {
		var user_m = $("#user_m").val();
		var password_m = $("#password_m").val();
		$.ajax({
			type: "POST",
			url: site_url + "calendarMeeting/feedMtForAndroid",
			data: "psId="+153+"&limit="+5,
			dataType: "json",
			dataCharset: 'json',
			async: false,
			success: function(data){
			alert(data);
				//$( "#user_id" ).html(data[0].user_id);
				//$( "#user_name" ).html(data[0].user_name);
			}
		});
	}
});
</script> 

	<?php //echo "id:".$_SESSION['user_id'];?>
				<input type="hidden" name="user_id_h" id="user_id_h" value="" />
				<input type="hidden" name="user_name_h" id="user_name_h" value=""  />

			<center>	
			
				<table width="100%" border="0">
				<tr>
					<td><span class="content_title"><span >username</span></span></td>
					<td><input type="text" name="user_m" id="user_m" value=""  class="input_text" /></td>
				</tr>
				<tr>
					<td><label class="content_title"><span >password</span></label></td>
					<td><input id="password_m" name="password_m" value="" type="password" class="input_text"/></td>
				</tr>
				</table>
		
			<br>
		<input value="ตกลง" type="button" id="btnsubmit" />
		<br>
		</center>

<br/><br/>
username :<div id="user_id"></div>
<br/><br/>
password :<div id="user_name"></div>