<style type="text/css">
	table{
		font-size : 15px;
		width : 50%;
		border-width : 1px;
		border-color : #D0DCF0;
		background-color : #D0DCF0;
		padding : 0px;
	}
	td {
		border-color : #D0DCF0;
		background-color : white;
		padding : 3px;
	}
	th{
		font-weight:bold;
		text-align:center;
		background-color:#EEF2F7;
		padding : 3px;
	}
</style>
<?php
	$row_cms = (isset($rs_cms))?$rs_cms->row():"";
	$row_mt = (isset($rs_mt))?$rs_mt->row():"";
?>
<div align="center">
	<p>&nbsp;</p>
	<div style="width:75%;">
	<h3>ตรวจสอบการรับรองมติ</h3>
	การประชุม<?php echo $row_cms->cms_name; ?>&nbsp;ครั้งที่&nbsp;<?php echo al_to_th($row_mt->mt_no); ?>/<?php echo al_to_th($row_mt->mt_year); ?>
	</div>
	<hr width="60%"/>
	<p>&nbsp;</p>
	<table>
		<thead>
			<tr>
				<th width="20%">ลำดับที่</th>
				<th width="60%">ชื่อผู้เข้าร่วมประชุม</th>
				<th>สถานะ</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		// Image OK
		$ok = array(
			"src" => "images/emeeting/yes.png",
			"width" => "16",
			"border" => "0"
		);
		$imgOK = img($ok);

		if(isset($qu_pnt) && $qu_pnt->num_rows() > 0){
			$x = 1;
			foreach($qu_pnt->result() as $row_pnt){
				if($row_pnt->pnt_personId != NULL){
		?>
					<tr>
						<td align="center"><?php echo $x++; ?></td>
						<td><?php echo $row_pnt->ipf.$row_pnt->fName." ".$row_pnt->lName; ?></td>
						<td align="center">
						<?php 
							if(isset($qu_agapa) && $qu_agapa->num_rows() > 0){
								foreach($qu_agapa->result() as $row_appr){
									if($row_pnt->pnt_personId == $row_appr->agapa_ps_id){
										echo $imgOK;
									} 
								}
							}
						?>
						</td>
					</tr>
				<?php
				}
			}
		}
		else{
		?>
			<tr>
				<td colspan="3" class="red" align="center"><?php echo $this->config->item("emt_not_found");?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>
</div>