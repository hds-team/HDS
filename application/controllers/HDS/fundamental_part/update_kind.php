<?php
	//echo "เด่นแรด";
	//echo "เด่นแรด";
	
	$kn_id = $this->input->post('kn_id');
	$data['kn_name'] = $this->input->post('kn_name');
	$this->m_dynamic->update('hds_kind', 'kn_id', $kn_id, $data);
	redirect(base_url('index.php/'.$this->hds_part.'/fundamental/kind'));
?>