<?php
echo link_tag('css/emt_css/emt_auto_selete.css');
?>
<script type="text/javascript">
$(document).ready(function(){
	// Add Event
	$("#back").click(back);
	
	// Function
	function back(){
		url = site_url+"groupMeeting/group";
		sendPost("frm", "", url, "", "");
	}
   
});

</script>
<style>
	.icon{
		cursor : pointer;
	}
</style>

	<div id="content-header" style="padding:50px 195px 5px;">
	<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { ?>
		<div id="guide_ie">
			<?php
			if(isset($menu)){
				echo guide($menu,1);
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
				echo guide($menu,1);
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
	</div>
	
	<?php 
	if(isset($nGp)) {
		foreach($nGp as $key => $row_cms){
		$ngp = $row_cms->gp_name;
		}
	}
	else {
		$ngp = "";
	}	
	?>
	
					
	
	<div class="grid_4_center">
            <div class="da-panel collapsible">
            <div class="da-panel-header">
                <span class="da-panel-title">
					<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/group.png";?> />
                                       กำหนดกลุ่มผู้เข้าร่วมประชุม
                </span>
				
			</div>
		<?php
			$action = "groupMeeting/insertGroup";
			echo form_open($this->config->item("emt_path").$action);
		?>
		<div class="da-panel-content">
            <form class="da-form">
                <div class="da-form-inline">
				
		<div style="padding:25px;">
			<b>ชื่อกลุ่ม : </b>
			<input type="text" name="gpname" size="60" title="ชื่อกลุ่ม" />&nbsp;<span class="red">*</span>
		</div>

		
		 <div class="grid_3_center"  >
            <div class="da-panel">
                <div class="da-panel-header" >
                    <span class="da-panel-title">
					<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/text_list_bullets.png"; ?> />       
                                       รายชื่อบุคลากร (รายชื่อจะเรียงตามตัวอักษร ก-ฮ)
                    </span>
                </div>
		<div class="da-panel-content">
			<div class="da-form-row">
				<label> </label>
					<div class="da-form-item">
                        <ul class="da-form-list">
			<?php
			$str = 25;
			if(isset($dArray) && !empty($dArray)){
				//--คลี่รายชื่อตามโครงสร้างหน่วยงาน
				foreach($dArray as $d_key => $d_val){
					$tab = 25;
					for($j=1;$j<=$d_val["deptLevel"];$j++){
						$tab += $str;
					}
					echo "<p style=\"padding-left:".$tab."px;\"><b>".$d_val["deptName"]."</b><br/>";//ชื่อหน่วยงาน
					
					$tab += $str;
					echo "<ul style=\"padding-left:".$tab."px;list-style: none outside none;\" >";
					$rs_ps = $mps->getPsByDeptId($d_val["deptId"]);
					foreach($rs_ps->result() as $row_ps){
						echo "<li><input type=\"checkbox\" name=\"person[]\" value=\"".$row_ps->personId."\" style=\"margin:5px 10px 5px 0px;\" /><span>".$row_ps->fName." ".$row_ps->lName."</span></li>";
					}
					echo "</ul>";
					echo "</p>";
				}
			}
			else{
				//Egoist---------------------
				//--คลี่รายชื่อทั้งหมด เนื่องจากยังไม่มีโครงสร้างหน่วยงาน
				$dpId = $this->session->userdata("emt_dpId");
				$dpName = $mdp->getName($dpId);
				
				echo "<p style=\"padding-left:".$str."px;\"><b>".$dpName."</b><br/>";
				
					$str += $str;
					echo "<ul style=\"padding-left:".$str."px;list-style: none outside none;\" >";
					$rs_ps = $mps->getAllPersonByDpId($dpId);
					foreach($rs_ps as $row_ps){
						echo "<li><input type=\"checkbox\" name=\"person[]\" value=\"".$row_ps->personId."\" style=\"margin:5px 10px 5px 0px;\" /><span>".$row_ps->fName." ".$row_ps->lName."</span></li>";
					}
					echo "</ul>";
				echo "</p>";
			}
			//Egoist---------------------
			?>
		
		<?php
			echo form_close();
		?>
		      </ul>
            </div>
		</div>		
	</div>
	
	<div align="center" style="padding:25px;">
			<input type="submit" name="submit" id="submit" value="บันทึก" class="da-button green"/>
	</div>
			        </form>
		        </div>
		   

		</div>
	</div>

	
		</div>
	</div>	
</div>
<div><span style="padding-right:130px;">&nbsp;</span> </div>			
