<?php
	
	//echo $data['UsID'];
	$this->load->model('HDS/reply/m_reply');
	$data['request'] = $this->m_reply->get_request($rq_id);
	$data['file'] = $this->m_dynamic->get_by_id('hds_file', 'fl_rq_id',$rq_id);
	$data['reply'] = $this->m_dynamic->get_by_id('hds_reply', 'rp_rq_id',$rq_id);
	$data['content'] = $this->hds_output('reply/v_reply',$data,TRUE);
?>