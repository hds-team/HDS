<?php //อันนี่ที่กุลบ
$status = isset($status);
if(!isset($cms_id)){
	echo "<div style=\"font-size:16px;color:red;\" >ไม่พบรหัสการประชุมหลัก กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</div>";
	die;
}
?>

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/css/jquery.ui.all.css" media="screen" />

<link rel="stylesheet" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/elrte/css/elrte.css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/elfinder/css/elfinder.css" media="screen" />

<!-- Plugin Files -->

<!-- FileInput Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/jquery.fileinput.js"></script>
<!-- Scrollbar Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/jquery.tinyscrollbar.min.js"></script>
<!-- Tooltips Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/tipsy/jquery.tipsy-min.js"></script>
<link rel="stylesheet" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/tipsy/tipsy.css" />

<!-- Validation Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/validate/jquery.validate.min.js"></script>

<!-- jGrowl Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/jgrowl/jquery.jgrowl.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/jgrowl/jquery.jgrowl.css" media="screen" />

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.ui.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/core/dandelion.core.js"></script>
<!-- tab -->
<!-- Validation Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.ui.js"></script>
<!-- tab -->
<script type="text/javascript">
  if (document.location.hash == "" || document.location.hash == "#")
    document.location.hash = "#tabs-2";
</script>

<!----------->

<!--tooltip
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
label {
display: inline-block; width: 5em;
}
fieldset div {
margin-bottom: 2em;
}
fieldset .help {
display: inline-block;
}
.ui-tooltip {
width: 210px;
}
</style>
<script>
$(function() {
var tooltips = $( "[title]" ).tooltip();
$( "<button>" )
.text( "Show help" )
.button()
.click(function() {
tooltips.tooltip( "open" );
})
.insertAfter( "form" );
});
</script>
-->
<script>
$(document).ready(function(){
	// Add Event
	//egoist
	$("#chk_all").live("click",getChecked);
	$(".BB").live("click",getChecked);
	//egoist
	$("#back").click(back);
	$("#btnnextto3").click(chkform);
	
	/*$('span[title].subindex').qtip({
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
   });*/
   
	// set class sortable for sortable
	$(".sortable").sortable({
		placeholder: "ui-state-highlight",
		opacity: 0.95,
		delay: 50,
		stop:function(event, ui){
			var url = "<?php echo site_url() . "emeeting/emeeting/ptpSeq"; ?>";
			var index = $(this).sortable('toArray');
			$.post(url,{index:[index]},function(data){
			});
		}
	});
	
	function chkform(){
		var flag = 0;
		for( i in arr_ptp_ag ){
			ag_id = arr_ptp_ag[i];
			for( j in ag_ok ){
				if(ag_id == ag_ok[j]){
					flag = 1;
					break;
				}
			}
		}
		if(flag == 0){
			alert("การกำหนดบุคลากร จำเป็นต้องมี ผู้ที่มีสิทธิ์ในการจัดประชุมอย่างน้อย 1 คน");
			$("fieldset comment").css("border","1px solid #FFAAAA").css("background","#FFFAFA");
			setTimeout(function(){
				$("fieldset comment").css("border","1px solid #FFFFFF").css("background","#FFFFFF");
			},4500);
			return false;
		}
		return true;
	}
	function back(){
		var flag_ok = 1;
		//flag_ok = chkform();
		if(flag_ok == 1){
			url = site_url+"emeeting/commissionView";
			sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
		}
	}
});

function ptpEdit(ptp_id){
	var url = site_url + "<?php 
		if($status != "edit"){
			echo "emeeting/commissionAdd";
		}
		else{
			echo "emeeting/commissionEditPtp";
		}
	?>";
	sendPost("ptpEdit",{"step":"2","cms_id":<?php echo $cms_id; ?>,"ptp_id":ptp_id,"flag_edit":"1"},url,"","");
}

function ptpDel(ptp_id, warnMsg){
	var url = site_url + "<?php 
		if($status != "edit"){
			echo "emeeting/commissionAdd";
		}
		else{
			echo "emeeting/commissionEditPtp";
		}
	?>";
	sendPost("ptpDel",{"step":"2","cms_id":<?php echo $cms_id; ?>,"ptp_id":ptp_id,"flag_del":"1"},url,"","คุณต้องการลบ \""+warnMsg+"\" ใช่หรือไม่");
}
//egoist
	function getChecked()
	{
		if($(this).attr("checked") == "checked")
		{
			$("#btnSubmit").removeAttr("disabled");
		}
	}
	
	function chkList(flag,tclass)
	{
	if(flag == 1){
		$("."+tclass).attr("checked",true);
	}
	else{
		$("."+tclass).attr("checked",false);
	}
	}
	//egoist
// Implement to your program
function acLink(id){
(globaldata[id].name);
	var data = globaldata[id];
	if(get == "getPerson"){ //link in Person
		//set value in Person
		obj.parents(".type1").find("input[name^=ptp_personId]").val(data.personId);
		obj.parents(".type1").find("input[name^=personName]").val(data.name);
		//set value in adminName
		obj.parents(".type1").find("input[name^=ptp_adminId]").val(data.adminId);
		obj.parents(".type1").find("input[name^=adminName]").val(data.adminName);
		obj.parents(".type1").find("input[name^=ptp_deptId]").val(data.deptId);
		//set value in deptname
		obj.parents(".type1").find("input[name^=ptp_dpId]").val(data.dpId);
		obj.parents(".type1").find("input[name^=deptName]").val(data.deptName); 
		//set value in email	
		obj.parents(".type1").find("input[name^=ptp_email]").val(data.email); 
	}
		
	var rowPtp_responsible = "rowPtp_type1 = \"<select style='width:32%;'>\";$(\"input.responsible\").each(function(index,value)";
		rowPtp_responsible += "{rowPtp_type1  += \"<option>\"+value.value+\"</option>\"; });";
		rowPtp_responsible +="rowPtp_type1 += \"</select>\";$(\"#recorder\").html(rowPtp_type1);";
		setTimeout(rowPtp_responsible,2000); 
		
	var rowPtp_responsible = "rowPtp_type1 = \"<select style='width:32%;'>\";$(\"input.responsible\").each(function(index,value)";
		rowPtp_responsible += "{rowPtp_type1  += \"<option>\"+value.value+\"</option>\"; });";
		rowPtp_responsible +="rowPtp_type1 += \"</select>\";$(\"#report_notes1\").html(rowPtp_type1);";
		setTimeout(rowPtp_responsible,2000); 
	
	var rowPtp_responsible = "rowPtp_type1 = \"<select style='width:32%;'>\";$(\"input.responsible\").each(function(index,value)";
		rowPtp_responsible += "{rowPtp_type1  += \"<option>\"+value.value+\"</option>\"; });";
		rowPtp_responsible +="rowPtp_type1 += \"</select>\";$(\"#report_notes2\").html(rowPtp_type1);";
		setTimeout(rowPtp_responsible,2000); 
		
	var rowPtp_responsible = "rowPtp_type1 = \"<select style='width:32%;'>\";$(\"input.responsible\").each(function(index,value)";
		rowPtp_responsible += "{rowPtp_type1  += \"<option>\"+value.value+\"</option>\"; });";
		rowPtp_responsible +="rowPtp_type1 += \"</select>\";$(\"#Inspectors_Report\").html(rowPtp_type1);";
		setTimeout(rowPtp_responsible,2000); 
	
	/*
	//-- 2013-04-01 meuzicxx โครงสร้างยังไม่เรียบร้อย
	else if(get == "getAdmin"){
		//set value in Admin
		obj.parents(".type2").find("input[name^=ptp_adminId]").val(data.adminId);
		obj.parents(".type2").find("input[name^=adminName]").val(data.name);
		//set value in Person
		obj.parents(".type2").find("input[name^=ptp_personId]").val(data.personId);
		obj.parents(".type2").find("input[name^=personName]").val(data.personName);
		//set value in deptName
		obj.parents(".type2").find("input[name^=ptp_deptId]").val(data.deptId);
		obj.parents(".type2").find("input[name^=deptName]").val(data.deptName);
		//set value in email	
		obj.parents(".type2").find("input[name^=ptp_email]").val(data.email); 
	}*/
	
	$(".autocomplete-block").remove();
	
}
function acStart(obj){
	if(get == "getPerson"){ //link in Person
		personId = obj.parent().find("input[name^=ptp_personId]").val();
		if(personId > 0){
			obj.parents(".type1").find("input[name^=ptp_personId]").val("");
			obj.parents(".type1").find("input[name^=ptp_adminId]").val("");
			obj.parents(".type1").find("input[name^=adminName]").val("");
			obj.parents(".type1").find("input[name^=ptp_deptId]").val("");
			obj.parents(".type1").find("input[name^=ptp_dpId]").val("");
			obj.parents(".type1").find("input[name^=deptName]").val("บุคคลภายนอก");
			obj.parents(".type1").find("input[name^=ptp_email]").val("");
		}
	}
	/*
	//-- 2013-04-01 meuzicxx โครงสร้างยังไม่เรียบร้อย
	else if(get == "getAdmin"){
		adminId = obj.parent().find("input[name^=ptp_adminId]").val();
		if(adminId > 0){
			obj.parents(".type2").find("input[name^=ptp_adminId]").val("");
			obj.parents(".type2").find("input[name^=ptp_personId]").val("");
			obj.parents(".type2").find("input[name^=personName]").val("");
			obj.parents(".type2").find("input[name^=ptp_deptId]").val("");
			obj.parents(".type2").find("input[name^=deptName]").val("บุคคลภายนอก");
			obj.parents(".type2").find("input[name^=ptp_email]").val("");
		}
	}*/
}

</script>
<style>
	.sortable{
		width : 100%;
		margin : 0px;
		padding : 0px;
	}
	.sortable tr{
		line-height : 25px;
		list-style: none;
		margin : 0px;
		padding : 0px;
		padding-left : 20px;
		cursor:move;
		border : 1px solid #FFFFFF;
	}
	.sortable tr:hover{
		border : 1px solid #D0DCF0;
	}
	.sortable tr.ui-state-highlight { 
		height : 30px;
		line-height : 30px;
		background : #D0DCF0;
	}
	tr.ui-sortable-helper{
		border : 1px solid #fad42e;
		background: #FAFAFA;
		
	}
	.icon{
		cursor : pointer;
	}
	select.validate{
		width :	150px;
		margin : 0px 5px;
	}
	.selectPaticipant{
		width : 150px;
	}
</style>
<!--Egoist -->
<script language="javascript">
function frmdel()
{
document.getElementById("frm1").submit();
}
</script>
	<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { ?>
		<div id="guide_ie">
			<?php
			if(isset($menu)){
				//echo guide($menu,2);
			} else {
				$back = array(
					"src" => "images/emeeting/icons/back.png"
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			}
			?>
		</div>
	<?php } else { ?>
		<div id="guide">
			<?php
			if(isset($menu)){
				//echo guide($menu,2);
			} else {
				$back = array(
					"src" => "images/emeeting/icons/back.png"
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			}
			?>
		</div>
	<?php } ?>
	<div class="grid_4">
			<div id="da-ex-tabs-plain">
				<ul>
					<li><a href="#">สร้างการประชุม</a></li>
					<li><a href="#tabs-2">กำหนดบุคลากร</a></li>
					<li><a href="#">กำหนดอีเมล์</a></li>
					<li><a href="#">กำหนดระเบียบวาระ</a></li>
					<li><a href="#">ยืนยัน</a></li>
				</ul>
				<div id="tabs-">
				</div>
				<div id="tabs-2">
		<h3>กำหนดบุคลากร &nbsp;&nbsp;</h3>
			<!-- โดยชื่อ
		<p>&nbsp;</p>
		-->
		<?php
			$edit = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images\icons\color\application_edit.png",
				"width" => "16",
				"border" => "0"
			);
			$imgEdit = img($edit);
			
			$del = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images\icons\color\cross.png",
				"width" => "16",
				"border" => "0"
			);
			$imgDel = img($del);
			
			if( $status != "edit" ){
				$action = "emeeting/commissionAdd";
				$actionForGroup = "emeetingAjax/getGroup";
			}
			else {
				$action = "emeeting/commissionEditPtp";
				//$action = "emeeting/commissionEditPtp";
				$actionForGroup = "emeetingAjax/getGroup";
				//$actionForGroup  = "emeeting/commissionEditPtpByGroupSave";
			}
			
			// Load model
			$arr_model = isset($arr_model) ? $arr_model : "";
			
			$ptp_id = $ptp_personId = $ptp_op_id = $name = $ptp_adminId = $ptp_deptId = $ptp_dpId = $adminName = $deptName = $ptp_ag_id = $ag_name = $ptp_quorum = $quorum_name = $ptp_typeAgenda = $ptp_email = "";
			if(isset($qu_edit) && $qu_edit->num_rows()){
				// edit participant template
				
				$arr_edt = get_ptpByTypeAg($qu_edit, $arr_model, $flag_edit=1);
				if(!empty($arr_edt)){
					foreach($arr_edt as $key => $row){
						$ptp_id = $row["ptp_id"];
						$ptp_personId = $row["ptp_personId"];
						$ptp_op_id = $row["ptp_op_id"];
						$name = $row["name"];
						$ptp_adminId = $row["ptp_adminId"];
						$ptp_deptId = $row["ptp_deptId"];
						$ptp_dpId = $row["ptp_dpId"];
						$adminName = $row["adminName"];
						$deptName = $row["deptName"];
						$ptp_ag_id = $row["ptp_ag_id"];
						$ag_name = $row["ag_name"];
						$ptp_quorum = $row["ptp_quorum"];
						$quorum_name = $row["quorum_name"];
						//$ptp_typeAgenda = $row["ptp_typeAgenda"];
						$ptp_email = $row["ptp_email"];
					}
				}
			}
		?>
		
				<?php 
					$edt_ptp_id = $edt_ptp_personId = $edt_ptp_op_id = $edt_name = $edt_ptp_adminId = $edt_ptp_deptId = $edt_ptp_dpId = $edt_adminName = $edt_deptName = $edt_ptp_email = "";
					$edt_ag_id = $edt_quorum_name = "";
					
				?>
<div>
<script>
var checkrollback=0;
function addpeople(){
	var rowPtp_type1 = "<tr class=\"type1\">";
					rowPtp_type1 += "<td>";
					rowPtp_type1 += "<span href=\"\" class=\"subindex\" title=\"กรุณาพิมพ์ ชื่อ นามสกุล เพื่อค้นหารายชื่อในระบบ แล้วคลิกเลือกรายชื่อใน dropdrown ไม่เช่นนั้นจะเป็นบุคคลภายนอก\">";
					rowPtp_type1 += "<input type=\"hidden\" name=\"ptp_id[]\" {$edt_ptp_id}/>";
					rowPtp_type1 += "<input type=\"hidden\" name=\"ptp_personId[]\" {$edt_ptp_personId}/>";
					rowPtp_type1 += "<input type=\"hidden\" name=\"ptp_op_id[]\" {$edt_ptp_op_id}/>";
					rowPtp_type1 += "<input type=\"text\" class=\"autocomplete validate responsible\" ";
					rowPtp_type1 += "class=\"da-tooltip-w\" title=\"กรุณาพิมพ์ ชื่อ นามสกุล เพื่อค้นหารายชื่อในระบบ แล้วคลิกเลือกรายชื่อใน dropdrown ไม่เช่นนั้นจะเป็นบุคคลภายนอก\" get=\"getPerson\" name=\"personName[]\" value='' />";
					rowPtp_type1 += "</span>";				
					
					rowPtp_type1 += "</td>";
					rowPtp_type1 += "<td>";

					rowPtp_type1 += "<input type=\"text\" name=\"adminName[]\" />";
					rowPtp_type1 += "</td>";
					rowPtp_type1 += "<td>";
					rowPtp_type1 += "<input type=\"text\" name=\"deptName[]\"  />";
					rowPtp_type1 += "</td>";
					
					rowPtp_type1 += "<td>";
					rowPtp_type1 += "<select type=\"text\" class=\"validate\" ";
					rowPtp_type1 += "title=\"ตำแหน่งในการประชุม\" get=\"getAgency\" name=\"ptp_ag_id[]\" >";
					rowPtp_type1 += "<option value=\"\">--โปรดเลือกตำแหน่งในการประชุม--</option>";
					<?php foreach($rs_ag->result() as $row_ag){
						$selected = "";
						if($edt_ag_id == $row_ag->ag_id){
							// edit participant template
							$selected = "selected=\"selected\" ";
						}?>
						rowPtp_type1 += "<option value=\"<?php echo $row_ag->ag_id?> \" <?php echo $selected?> ><?php echo $row_ag->ag_name ?></option>";
					<?php } ?>
					rowPtp_type1 += "</select>";
					<?php
					$qrm1 = $qrm0 = "";	// init
					if($edt_quorum_name == "องค์ประชุม"){
						$qrm1 = " selected=\"selected\" ";
					}
					else if($edt_quorum_name == "ผู้เข้าร่วมประชุม"){
						$qrm0 = " selected=\"selected\" ";
					} ?>
					rowPtp_type1 += "<select name=\"ptp_quorum[]\">";
					rowPtp_type1 += "<option value=\"1\" {$qrm1} >องค์ประชุม</option>";
					rowPtp_type1 += "<option value=\"0\" {$qrm0} >ผู้เข้าร่วมประชุม</option>";
					rowPtp_type1 += "</select>";
					rowPtp_type1 += "<input type=\"hidden\" name=\"ptp_email[]\" {$edt_ptp_email} />";
					rowPtp_type1 += "</td>";
					rowPtp_type1 += "<td class=\"action\" >";
					rowPtp_type1 += "<input type=\"hidden\" name=\"step\" value=\"2\" />";
					rowPtp_type1 += "<input type=\"hidden\" name=\"cms_id\" value=\"{$cms_id}\" />";
					rowPtp_type1 += "<input type=\"hidden\" name=\"ptp_typeAgenda\" value=\"0\" />";
					rowPtp_type1 += "<input type=\"submit\" name=\"submit\" value=\"ลบ\" class=\"da-button red\" id=\"peopleDel\" />";
					rowPtp_type1 += "</td>";
					rowPtp_type1 += "</tr>";
					
	$("#table1 tbody").append(rowPtp_type1);
	
}
<?php $actionForGroup = "emeetingAjax/getGroup"; ?>
$( document ).ready(function() {

	
	$( "#select_group2" ).live( "change",function () {
	
	//alert($("#pname"));
	if(document.getElementById('pname') != null){
	if(document.getElementById('pname').value == ''){
	$("#df_table").remove();	
	}
	}
	idT = $("#select_group2").val();
	
	$.ajax({
  type: "POST",
  url: "<?php echo site_url().$this->config->item("emt_path").$actionForGroup ?>",
  data: { id: idT ,edt_ag_id: "<?php echo $ptp_ag_id; ?>" ,edt_ptp_email: "<?php echo $ptp_email ?>" , 
  cms_id: "<?php echo $cms_id;?>" , edt_quorum_name : "<?php echo $quorum_name;?>" , 
  edt_ptp_id : "<?php echo $ptp_id; ?>", edt_ptp_personId : "<?php echo $ptp_personId;?>" ,
  edt_ptp_op_id : "<?php echo $ptp_op_id; ?>"  },
  success: function(response) { 
            $("#table1 tbody").append(response);
			$("#select_group").html("");	
			$("#id_group").html("เพิ่มคนโดยกลุ่ม");
			checkrollback=0;
           }
	})
	
	<?php $this->session->userdata('count_responsible'); ?>
	var rowPtp_responsible = "rowPtp_type1 = \"<select style='width:32%;'>\";$(\"input.responsible\").each(function(index,value)";
		rowPtp_responsible += "{rowPtp_type1  += \"<option>\"+value.value+\"</option>\"; });";
		rowPtp_responsible +="rowPtp_type1 += \"</select>\";$(\"#recorder\").html(rowPtp_type1);";
		setTimeout(rowPtp_responsible,2000); 
		
	var rowPtp_responsible = "rowPtp_type1 = \"<select style='width:32%;'>\";$(\"input.responsible\").each(function(index,value)";
		rowPtp_responsible += "{rowPtp_type1  += \"<option>\"+value.value+\"</option>\"; });";
		rowPtp_responsible +="rowPtp_type1 += \"</select>\";$(\"#report_notes1\").html(rowPtp_type1);";
		setTimeout(rowPtp_responsible,2000); 
	
	var rowPtp_responsible = "rowPtp_type1 = \"<select style='width:32%;'>\";$(\"input.responsible\").each(function(index,value)";
		rowPtp_responsible += "{rowPtp_type1  += \"<option>\"+value.value+\"</option>\"; });";
		rowPtp_responsible +="rowPtp_type1 += \"</select>\";$(\"#report_notes2\").html(rowPtp_type1);";
		setTimeout(rowPtp_responsible,2000); 
		
	var rowPtp_responsible = "rowPtp_type1 = \"<select style='width:32%;'>\";$(\"input.responsible\").each(function(index,value)";
		rowPtp_responsible += "{rowPtp_type1  += \"<option>\"+value.value+\"</option>\"; });";
		rowPtp_responsible +="rowPtp_type1 += \"</select>\";$(\"#Inspectors_Report\").html(rowPtp_type1);";
		setTimeout(rowPtp_responsible,2000); 
	//alert($(".responsible"));
	//rowPtp_type1 += "<option>poiioiko</option>";
	

  });
 });

 $("#peopleDel").live("click",peopleDel);
 
function peopleDel(){
		var warnMsg = $(this).parents("tr:first").find("input[name^=personName]").val(); 
		if(warnMsg){
			warnMsg = " \""+warnMsg+"\" ";
		}
		if(!confirm("คุณต้องการลบ"+warnMsg+"ใช่หรือไม่")){
			return false;
		}
		$(this).parents("tr:first").remove();
	}
</script>
</div>
<div>
<script>
var checkrollback=0;
function addgroup() {
    
	var countgroup=0;
	if(countgroup==checkrollback) {
		var rowPtp_type3;
					rowPtp_type3 = "<select id=\"select_group2\"  type=\"text\"  ";
					rowPtp_type3 += "title=\"กลุ่มผู้ประชุม\"  name=\"gp_id\" style=\"width:30%;\" >";
					rowPtp_type3 += "<option value=\"\">-- เลือกกลุ่ม --</option>";
					<?php
						foreach($rs_gp->result() as $row_gp){?>
							rowPtp_type3 += "<option value=\"<?php echo $row_gp->gp_id; ?>\" ><?php echo $row_gp->gp_name , $row_gp->gp_id ?></option>";
						<?php }
					?>
					rowPtp_type3 += "</select>";
				document.getElementById("select_group").innerHTML=rowPtp_type3;	
				document.getElementById("id_group").innerHTML="ยกเลิกการเพิ่มคนโดยกลุ่ม";	
				checkrollback++;
				
	}
	else {
		var roback="";
		document.getElementById("select_group").innerHTML=roback;
		document.getElementById("id_group").innerHTML="เพิ่มคนโดยกลุ่ม";		
		checkrollback=0;
		
	}
	
	
}

</script>
	
	<input type='hidden' value='kkk' class='qqq'/>
	<input type='hidden' value='kkk1' class='qqq'/>
</div>
<div id="da-panel collapsible" class="grid_4">

	<button href="javascript:void(0);" onclick='addpeople()' title="เพิ่มผู้เข้าร่วมประชุม" class="da-button blue"><?php echo "เพิ่มคน"; ?></button>
	<button href="javascript:void(0);" onclick='addgroup()' title="เพิ่มผู้เข้าร่วมประชุม" id="id_group" class="da-button blue"><?php echo "เพิ่มคนโดยกลุ่ม"; ?></button>&nbsp;&nbsp;&nbsp;<span id="select_group"></span>
	<br/><br/>
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/32/users_2.png">
				รายชื่อบุคลากรในการประชุม
			</span>
		</div>
		<div class="da-panel-content">
		<?php 
			//$action = "emeeting/commissionInsert";
			echo form_open($this->config->item("emt_path").$action,"frmType1");
		?>
		<table style="width:100%;" align="center" class="p2_table" id="table1">
			<thead>
				<tr>
					<th>ชื่อ-นามสกุล </th>
					<th>ตำแหน่ง</th>
					<th>หน่วยงาน</th>
					<th title = "หน้าที่ในการประชุมที่สามารถจัดการประชุมได้มีดังนี้
	- กรรมการและผู้ช่วยเลขานุการ 
	- กรรมการและเลขานุการ
	- ผู้ช่วยเลขานุการ
	- เลขาการประชุม
	- เลขานุการ">
					ตำแหน่งในการประชุม&nbsp;</th>
					<th class="action" width="40px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				
				$arr_ptp_ag = array();
				//if(isset($rs_ptp) && $rs_ptp->num_rows > 0){
					$arr_ps = get_ptpByTypeAg($rs_ptp, $arr_model, $flag_edit=0);
					$i = 0;

					//if(!empty($arr_ps)){
						$opt_ptp = array();	// to get last participant template
						$opt_ptp[""] = "-----โปรดเลือก-----";
						foreach($arr_ps as $key => $value){
							$ptp_id = $value["ptp_id"];
							$name = $value["name"];
							$ptp_adminId = $value["ptp_adminId"];
							$adminName = $value["adminName"];
							$deptName = $value["deptName"];
							$ag_name = $value["ag_name"];
							$ptp_ag_id = $value["ptp_ag_id"];
							$quorum_name = $value["quorum_name"];
							//$ptp_typeAgenda = $value["ptp_typeAgenda"];
							$ptp_op_id = $value["ptp_op_id"];
					
					$edt_ptp_id = $edt_ptp_personId = $edt_ptp_op_id = $edt_name = $edt_ptp_adminId = $edt_ptp_deptId = $edt_ptp_dpId = $edt_adminName = $edt_deptName = $edt_ptp_email = "";
					$edt_ag_id = $edt_quorum_name = "";
					if($ptp_typeAgenda == 0){
						$edt_ptp_id = "value=\"{$ptp_id}\" ";
						$edt_ptp_personId = "value=\"{$ptp_personId}\" ";
						$edt_ptp_op_id = "value=\"{$ptp_op_id}\" ";
						$edt_name = "value=\"{$name}\" ";
						$edt_ptp_adminId = "value=\"{$ptp_adminId}\" ";
						$edt_adminName = "value=\"{$adminName}\" ";
						$edt_ptp_deptId = "value=\"{$ptp_deptId}\" ";
						$edt_ptp_dpId = "value=\"{$ptp_dpId}\" ";
						$edt_deptName = "value=\"{$deptName}\" ";
						$edt_ag_id = $ptp_ag_id;
						$edt_quorum_name = $quorum_name;
						$edt_ptp_email = "value=\"{$ptp_email}\" ";
					}

					$rowPtp_type1 = "<tr class=\"type1\" id=\"df_table\" > ";
					$rowPtp_type1 .= "<td>";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"ptp_id[]\" {$edt_ptp_id} />";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"ptp_personId[]\" {$edt_ptp_personId} />";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"ptp_op_id[]\" {$edt_ptp_op_id} />";
					
					
					$rowPtp_type1 .= "<input type=\"text\" class=\"autocomplete validate responsible \" ";
					$rowPtp_type1 .= " class=\"da-tooltip-w\" title=\"กรุณาพิมพ์ ชื่อ นามสกุล เพื่อค้นหารายชื่อในระบบ แล้วคลิกเลือกรายชื่อใน dropdrown ไม่เช่นนั้นจะเป็นบุคคลภายนอก\" get=\"getPerson\" name=\"personName[]\" {$edt_name} id='pname'/>";
					$rowPtp_type1 .= "</span>";		
					
					$rowPtp_type1 .= "</td>";
					$rowPtp_type1 .= "<td>";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"ptp_adminId[]\" {$edt_ptp_adminId} />";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"ptp_deptId[]\" {$edt_ptp_deptId} />";
					$rowPtp_type1 .= "<input type=\"text\" name=\"adminName[]\" {$edt_adminName} />";
					$rowPtp_type1 .= "</td>";
					$rowPtp_type1 .= "<td>";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"ptp_dpId\" {$edt_ptp_dpId} />";
					$rowPtp_type1 .= "<input type=\"text\" name=\"deptName[]\" {$edt_deptName} />";
					$rowPtp_type1 .= "</td>";
					
					$rowPtp_type1 .= "<td>";
					$rowPtp_type1 .= "<select type=\"text\" class=\"validate\" ";
					$rowPtp_type1 .= "title=\"\" get=\"getAgency\" name=\"ptp_ag_id[]\" >";
					
					$rowPtp_type1 .= "<option value=\"\">--โปรดเลือกตำแหน่งในการประชุม--</option>";
					
					foreach($rs_ag->result() as $row_ag){
						$selected = "";
						if($edt_ag_id == $row_ag->ag_id){
						
							// edit participant template
							$selected = "selected=\"selected\" ";
						}
						$rowPtp_type1 .= "<option value=\"{$row_ag->ag_id}\" {$selected} >{$row_ag->ag_name}</option>";
					}
					$rowPtp_type1 .= "</select>";
					
					$qrm1 = $qrm0 = "";	// init
					if($edt_quorum_name == "องค์ประชุม"){
						$qrm1 = " selected=\"selected\" ";
					}
					else if($edt_quorum_name == "ผู้เข้าร่วมประชุม"){
						$qrm0 = " selected=\"selected\" ";
					}
					$rowPtp_type1 .= "<select name=\"ptp_quorum[]\">";
					$rowPtp_type1 .= "<option value=\"1\" {$qrm1} >องค์ประชุม</option>";
					$rowPtp_type1 .= "<option value=\"0\" {$qrm0} >ผู้เข้าร่วมประชุม</option>";
					$rowPtp_type1 .= "</select>";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"ptp_email[]\" {$edt_ptp_email} />";
					$rowPtp_type1 .= "</td>";
					$rowPtp_type1 .= "<td class=\"action\" id=\"peopleDel\">";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"step\" value=\"2\" />";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"cms_id\" value=\"{$cms_id}\" />";
					$rowPtp_type1 .= "<input type=\"hidden\" name=\"ptp_typeAgenda\" value=\"0\" />";
					$rowPtp_type1 .= "<input type=\"submit\" name=\"submit\" value=\"ลบ\" class=\"da-button red\" />";
					$rowPtp_type1 .= "</td>";
					$rowPtp_type1 .= "</tr>";
					echo $rowPtp_type1;
					$i++;
					}
				//}
			//}	
			/*else{
					echo "<tr><td colspan='6' align='center' class='red'>" . $this->config->item("emt_not_found") . "</td></tr>";
				}*/
				?>
			</tbody>
		</table>

		</div>.
	</div>
</div>	
		<!--egoist--->
		<div style="padding-left:25px;">
			</br>
			<!--<b>หมายเหตุ</b>: <span class="error">*</span> --> <!--หมายถึง เป็นบุคลากรภายนอก -->
		</div>
		<!--
	<div align="right" style="width:100%;margin-top:25px;" class="grid_2">
		<div class="da-panel">
			<div class="da-panel-widget" style="width:30%;margin-right:25px;text-align:left;">
					หน้าที่ในการประชุมที่สามารถจัดการประชุมได้มีดังนี้
					<ul>
						<?php/* 
						foreach($rs_ag->result() as $row_ag){
							if($row_ag->ag_manage != 1){
								continue;
							}
							$ag_ok[] = $row_ag->ag_id;
							echo "<li> {$row_ag->ag_name}</li>";
						}*/
						?>
					</ul>
			</div>
		</div>
	</div>-->
		
		
		<?php 
			/*if(isset($opt_ptp) && !empty($opt_ptp)){
				// Form
				echo form_open($this->config->item("emt_path").$action,"frmLastPtp");*/
					?>
					
					<div style="padding-left:200px;">
						<input type="hidden" name="step" value="2" />
						<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
						<?php
							//echo "<input type=\"submit\" name=\"btnsubmitLast\" value=\"บันทึก\" class=\"da-button green\" />";
						?>
					</div>
					
					
			<div align="center">
		<?php
				// Close Form
				//echo form_close();
			//}
			if($status == "edit"){
				echo "<input class=\"da-button green\" type=\"submit\" name=\"submit\" id=\"btnnextto3\" value=\"บันทึก \"  style=\"width:150px;\" />";
			}
			else{?>
				<div align="center">
						<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
						<?php
						if( $status != "edit" ){
							echo "<input class=\"da-button blue\" type=\"submit\" name=\"submit\" id=\"btnnextto3\" value=\"ถัดไป  >\"  style=\"width:150px;\" />";
						}
						?>
				</div>
				<?php
			}
			?>
			</div>
			<?php 
			echo form_close();
			?>
			<?php
			//if(isset($flag) && $flag == "continue"){
				//Form
				//echo form_open($this->config->item("emt_path").$action,"frmNext");
		?>

			<?php
				// Close Form
				//echo form_close();
			//}		
			?>
		
		<!--<script>
			//ag_ok = <?php echo json_encode($ag_ok); ?>;
			//arr_ptp_ag = <?php echo json_encode($arr_ptp_ag); ?>;
		</script>-->
</div>
</div>
</div>