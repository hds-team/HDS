<div class="da-panel-content" style="border: 0;">
	<table class="da-table">
		<thead>
			<tr role="row">
				<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width:5%;"><center><b>ลำดับ</b></center></th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 234px;"><center><b>หัวเรื่อง</b></center></th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 214px;"><center><b>วันที่</b></center></th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 134px;"><center><b>ประเภท</b></center></th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 104px;"><center><b>หมวด</b></center></th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 134px;"><center><b>ผู้ส่ง</b></center></th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 134px;"><center><b>ดำเนินการ</b></center></th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php $index=0;
			foreach($query->result() as $row)
			{
		?>
			<tr class="odd">
				<td><center><?php echo $index+1; ?></center></td>
				<td><?php echo $row->rq_subject; ?></td>
				<td><?php echo $row->rq_date; ?></td>
				<td><?php echo $row->ct_name; ?></td>
				<td><?php echo $row->kn_name; ?></td>
				<td><?php echo $UsName; ?></td>
				<td><center>
					<input type="button" class="da-button blue" value="<?php echo $row->st_name; ?>" />
				</center></td>
			</tr>
		<?php 
			}
		?>
		</tbody>
	</table>
</div><!-- da-panel-content -->
