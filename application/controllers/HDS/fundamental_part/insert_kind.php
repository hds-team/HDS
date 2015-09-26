<?php
	$data['kn_name'] = $this->input->post('kn_name');
	//echo $data['kn_name'];
	$this->m_dynamic->insert('hds_kind', $data);
	redirect(base_url('index.php/'.$this->hds_part.'/fundamental/kind'));
?>