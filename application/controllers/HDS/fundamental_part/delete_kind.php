<?php
	//echo $kn_id;
	$this->m_dynamic->delete('hds_kind', 'kn_id', $kn_id);
	redirect(base_url('index.php/'.$this->hds_part.'/fundamental/kind'));
?>