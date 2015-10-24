<?php
		$data['hds_category'] = $this->m_report->get_category();
		$data['hds_kind'] = $this->m_report->get_kind();
		$data['hds_level'] = $this->m_report->get_level();
		$data['hds_system'] = $this->m_report->get_system_by_user($this->session->userdata('UsID'));
		$data['hds_comp'] = $this->m_dynamic->get_all($this->ums_part.'.umdepartment');
		$data['hds_member'] = $this->m_dynamic->get_all($this->ums_part.'.umuser');
		$data['hds_contact_type'] = $this->m_dynamic->get_by_id('hds_contact_type', 'ctt_status', 1);

		$actor_id = $this->session->userdata('GpID');
		if($actor_id != $this->config->item('co_op_id')){
			$data['display'] = "none";
		}else{
			$data['display'] = "";
		}

		$data['content'] = $this->hds_output('report/v_report', $data, true);
?>