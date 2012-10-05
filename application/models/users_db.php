<?php

class Users_db extends CI_Model {

	function Register($form_data)
	{
		$this->db->insert('users', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
}
?>
