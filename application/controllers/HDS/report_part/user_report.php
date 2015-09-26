<?php
		$data['hds_category'] = $this->m_report->get_category();
		$data['hds_kind'] = $this->m_report->get_kind();
		$data['hds_level'] = $this->m_report->get_level();
		$data['hds_system'] = $this->m_report->get_system_by_user($this->session->userdata('UsID'));

		$data['content'] = $this->hds_output('report/v_report', $data, true);
?>