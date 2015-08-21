<!-- ui -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/ui.js"></script>
<?php echo link_tag('css/emt_css/ui.css');?>

<script>
$(document).ready(function(){
	// Init
	url_edit = site_url + "bdEmeeting/agendaTemplateEdit";
	url_del = site_url + "bdEmeeting/agendaTemplateDel";
	
	$(".sortable").sortable({
		placeholder: "ui-state-highlight",
		opacity: 0.95,
		delay: 50,
		stop:function(event, ui){
			var url = "<?php echo site_url() . "/emeeting/bdEmeeting/agendaTemplateSeq"; ?>";
			var index = $(this).sortable('toArray');
			$.post(url,{index:index},function(data){
			});
		}
	});
	$( ".sortable" ).disableSelection();
	
	//Add event
	$(".edit").click(edit);
	$(".del").click(del);
	
	//Function
	function edit(){
		thm_id = $(this).attr("id");
		sendPost("frmAgenda",{"thm_id":thm_id},url_edit,"","");
	}
	
	function del(){
		thm_id = $(this).attr("id");
		sendPost("frmAgenda",{"thm_id":thm_id},url_del,"","คุณต้องการลบใช่หรือไม่");
	}
});
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
	.sortable tr-state-highlight { 
		height : 30px;
		line-height : 30px;
		background : #D0DCF0;
	}
	tr-sortable-helper{
		border : 1px solid #fad42e;
		background: #FAFAFA;
	}
</style>

<?php 
	if(isset($qu_tp)){
		$action = "bdEmeeting/agendaTemplateEdit";
		$tp_row = $qu_tp->row();
	}else{
		$action = "bdEmeeting/agendaTemplateAdd";
	}
	echo form_open($this->config->item("emt_path").$action,"frmAgendaTemplate");
?>

	<div class="grid_4_center">
	<div class="da-panel collapsible">
	<div class="da-panel-header">
        <span class="da-panel-title">
            <img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
			จัดการรูปแบบระเบียบวาระ
        </span>
     </div>
	 
	<div class="da-panel-content">
        <table class="da-table da-detail-view">
		<tbody>
			<tr>
			<td width="30%">
				<label>ระเบียบวาระ</label></th>
			</td>
				<td>
					<input class="validate" title="ระเบียบวาระ" type="text" name="thm_head" id="thm_head" value="<?php if(isset($tp_row->thm_head)){
																															echo $tp_row->thm_head;
																														}else{
																															echo set_value("thm_head");
																														}?>" size="30" />
					<span class="red">*</span>
				</td>
			</tr>
			<tr>
			<th>แสดงในหนังสือเชิญการประชุม</th>
				<td>
					<label class="font-normal">
						<input type="checkbox" name="thm_flag_show" id="thm_flag_show" value="Y" <?php	if(isset($tp_row) && $tp_row->thm_flag_show == "Y"){
																									echo "checked=\"checked\"";
																								}
																						 ?> />&nbsp;ปรากฎ
					</label><br/>
				</td>
			</tr>
			<tr>
				<td colspan="3" >
				<div class="da-button-row">
					<input type="reset" name="btnClear" id="btnClear" value="เครียร์ค่า" class="da-button gray left"/>
				</div>	
				<div class="da-button-row" align="right">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึก" class="da-button green" />
					<input type="hidden" name="thm_id" id="thm_id" value="<?php if(isset($tp_row->thm_id)){
																					echo $tp_row->thm_id;
																				}else{
																					echo set_value("thm_id");
																				}?>" />
					<input type="hidden" name="thm_seq" id="thm_seq" value="<?php	if(isset($tp_row)){
																						echo $tp_row->thm_seq;
																					}else{
																						echo set_value("thm_seq");
																				}?>" />
				</td>
			</tr>
		</tbody>
	</table>
		</div>
	</div>
</div>	
</div>	
	<?php echo form_close();?>
	<div class="grid_4_center">
	<div class="da-panel collapsible">
	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
										ระเบียบรูปแบบวาระ
                                    </span>
                                    
                                </div>
	<div class="da-panel-content">
	<table class="da-table" style="width:100%;" align="center" border="0">
		<thead>
			<tr>
				<th>ชื่อระเบียบวาระ</th>
				<th>แสดงในหนังสือเชิญประชุม</th>
				<th>ดำเนินการ</th>
			</tr>
		</thead>
		<tbody class="sortable">
			<?php
				if(isset($rs_tp) && $rs_tp->num_rows())
				{
					$i = 1;
					foreach($rs_tp->result() as $row)
					{
			?>
				<tr id="<?php echo $row->thm_id;?>">
					<td><?php echo $row->thm_head;?></td>
					<td width="20%" align="center"><?php 
					if($row->thm_flag_show!=null){
					echo "ปรากฎ";
					}//echo $row->thm_flag_show;?></td>
							
								<td align="center">
								<?php
									$edit = array(
										"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/application_edit.png",
										"width" => "16",
										"border" => "0",
										"title" => "แก้ไข"
									);
									$img_edit = img($edit);
								?>
									<a href="javascript:void(0)" class="edit" id="<?php echo $row->thm_id; ?>"><?php echo $img_edit; ?></a>
								<?php
									$del = array(
										"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/cross.png",
										"width" => "16",
										"border" => "0",
										"title" => "ลบ"
									);
									$img_del = img($del);
								?>
									<a href="javascript:void(0)" class="del" id="<?php echo $row->thm_id; ?>"><?php echo $img_del; ?></a>
								</td>
				</tr>
			<?php
					}
				}
				else
				{
			?>
				<tr>
					<td colspan="3" class="red" align="center"><?php echo $this->config->item("emt_not_found");?></td>
				</tr>
			<?php
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td colspan="3" align="right"><span>รวม&nbsp;&nbsp;<?php if(isset($rs_tp) && $rs_tp->num_rows()){
																			echo $rs_tp->num_rows();
																		}else{
																			echo 0;
																		}?>
																			&nbsp;รายการ</span></td>
			</tr>
		</tfoot>
	</table>
	</div>
	</div>
</div>
<p>&nbsp;</p>