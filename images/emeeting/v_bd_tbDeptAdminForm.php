<table class="emt_table" style="width:95%;" align="center" border="0">
	<thead>
		<tr>
			<th></th>
			<th>รหัสบุคลากร</th>
			<th>ชื่อ-นามสกุล</th>
			<th>หน่วยงาน</th>
		</tr>
	</thead>
	<tbody>
	<?php
		if(isset($rs_ps))
		{
			if(is_object($rs_ps))
			{
				foreach($rs_ps->result() as $ps)
				{
	?>
		<tr>
			<td align="center"><input type="checkbox" name="chk_dpa[]" class="chk_dpa" value="<?php echo $ps->personId;?>" <?php echo($ps->dpa_id > 0)?"checked=\"checked\"":'';?>/></td>
			<td align="center"><?php echo $ps->personCode;?></td>
			<td><?php echo $ps->prefixName.$ps->fName.'  '.$ps->lName;?></td>
			<td><?php echo $ps->deptName;?></td>
		</tr>
	<?php
				}
			}
			else if(is_array($rs_ps))
			{
				$num_arr = count($rs_ps);
				for($k =0;$k < $num_arr;$k++)
				{
					if($rs_ps[$k]['ps']->num_rows() > 0)
					{
	?>
		<tr>
			<td colspan="4" align="left"><span class="emt_bold"><?php echo $rs_ps[$k]['deptName'];?></span></td>
		</tr>
	<?php
						foreach($rs_ps[$k]['ps']->result() as $ps)
						{
	?>
		<tr>
			<td align="center"><input type="checkbox" name="chk_dpa[]" class="chk_dpa" value="<?php echo $ps->personId;?>" <?php echo($ps->flag)?"checked=\"checked\"":'';?>/></td>
			<td align="center"><?php echo $ps->personCode;?></td>
			<td><?php echo $ps->prefixName.$ps->fName.'  '.$ps->lName;?></td>
			<td><?php echo $ps->deptName;?></td>
		</tr>
	<?php
						}
					}
				}
			}
		}
		else
		{
	?>
		<tr>
			<td colspan="4" class="red" align="center"><?php echo $this->config->item("emt_not_found");?></td>
		</tr>
	<?php
		}
	?>
	</tbody>
</table>