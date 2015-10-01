<?php
	$this->load->model('HDS/reply/m_reply');
	$query = $this->m_reply->actor_check($mb_id);
	$result = $query->row_array();
	$value = $result['GpID'];
?>