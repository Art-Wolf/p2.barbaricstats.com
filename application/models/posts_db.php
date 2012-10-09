<?php

class Posts_db extends CI_Model {

	function Get_posts() {
		return $this->db->get('posts')->result();
	}

	function Post($form_data)
	{
		$this->db->insert('posts', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
}
?>
