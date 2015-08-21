<script type="text/javascript">
$(document).ready(function(){
	/*if(<?php echo $flag;?> == 1){
		
	}
	$("#btnSubmit").click(function(){  
		var url = site_url + "bdEmeeting/test";
		var cgd_st = $("input[name='cgd_st']").val();
		$.post(url,{"btnSubmit":"btnSubmit","cgd_st":cgd_st},function(data){
			url = site_url + "bdEmeeting/test";
			sendPost("frm", "", url, "", "");
		});     
	}); */
});

function open_in_bg()
{
	var n_url = site_url + "bdEmeeting/test2";
	var c_url = site_url + "bdEmeeting/test";
	window.open (n_url, "mywindow" );
	//window.open (c_url+"#maintain_focus","_self");
}

</script>
<?php 
	if(isset($qu_cfd)){
		$cgd_row = $qu_cfd->row();
	}
	echo $this->session->flashdata("message");
	echo link_tag('css/emt_css/emt_css.css');
	
	$action = "bdEmeeting/test";
	echo form_open($this->config->item("emt_path").$action,"frmGeneralNumber");
?>

<div id="content-body">
	<div style="width:95%;">
		<table align="center" border="0">
			<thead>
				<h3 align="center">TEST</h3>
				<p>&nbsp;</p>
			</thead>
			<tbody>
				<tr>
					<td colspan="2">
						<input class="validate" align="center" type="text" name="cgd_st" id="cgd_st" size="30" value="<?php if(isset($cgd_row)){
																																	echo $cgd_row->cgd_st;
																																}else{
																																	echo set_value("cgd_st");
																																}?>" />																				
					</td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr>
					<td align="center" colspan="2">
						<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึก" onclick="return open_in_bg()" />
						<!--<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึก" />-->
					</td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>
			</tbody>
		</table>
	</div>
	<?php echo form_close();?>
</div>
<p>&nbsp;</p>