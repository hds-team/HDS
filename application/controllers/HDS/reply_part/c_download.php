<?php
	$this->load->helper('download');
	$data = file_get_contents($this->config->item('uploads_dir').'/'.$fil_url);
	force_download($fil_url,$data);
?>