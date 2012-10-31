<?php

class Users_db extends CI_Model {

	function Register($form_data) {
		$this->db->insert('users', $form_data);
		
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		
		return FALSE;
	}

	function Signin($form_data) {
		$this->db->escape($form_data);

		$sql = "SELECT COUNT(*) AS CNT FROM users WHERE user_name = ? AND password = ?";

		$query = $this->db->query($sql, $form_data);

		if ($query->num_rows() == 1) {
			$row = $query->row_array();

			if ($row['CNT'] > 0) {
                        	return TRUE;
			}
                }

                return FALSE;
	}

	function Get_list() {
		return $this->db->get('users')->result();
	}
}
?>
