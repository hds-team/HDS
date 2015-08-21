
	<div class="grid_4_center">
        <div class="da-panel collapsible">
            <div class="da-panel-header">
                <span class="da-panel-title">
                    <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/list_w_image.png"; ?> />
							รายการ การประชุมหลัก   <span class="note" >( การประชุมที่คุณรับผิดชอบ )</span>
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
						รายการ การประชุมหลัก
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(isset($rs_cms)){
					$show_row = 0;
					// Image Add
					$add = array(
						"src" => "images/emeeting/icons/add.png",
						"width" => "16",
						"border" => "0"
					);
					$imgAdd = img($add);
					
					// URL
					$url = site_url() . "emeeting/emeeting/";
					$urlAdd = $url . "commissionAdd";
					$urlEdit = $url . "commissionEdit";
					$urlDel = $url . "commissionDel";
					$urlView = $url . "commissionView";
					foreach($rs_cms->result() as $key => $row_cms){
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
<div><span style="padding-right:130px;">&nbsp;</span> </div>