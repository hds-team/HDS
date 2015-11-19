<?php

	//----------------LOAD VIEW
	$data['content'] = $this->hds_output('admin/position/v_position', NULL, TRUE);
	$this->layout_output($data);
?>