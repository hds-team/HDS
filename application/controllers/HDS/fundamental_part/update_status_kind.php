<?php
	$data['kn_status']=$kn_status;
	$this->m_dynamic->update('hds_kind', 'kn_id', $kn_id, $data);
	redirect("/HDS/fundamental/kind");
	//echo $kn_status;
	
	
	?>