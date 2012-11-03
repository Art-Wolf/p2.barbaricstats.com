<?php

class Posts_db extends CI_Model {

	function Post_owner($form_data) {
		$this->db->select('posts.id');
                $this->db->from('posts');
		$this->db->where($form_data);

		if (count($this->db->get()->result()) > 0) {
			return true;
		} else {
			return false;
		}
	}

	function Get_posts() {
		$this->db->select('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp');
                $this->db->from('posts');
                $this->db->join('users', 'posts.user_id = users.id');

		return $this->db->get()->result();
	}

	function Get_user_posts($form_data) {
		$this->db->select('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp');
		$this->db->from('posts');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->where($form_data);

		return $this->db->get()->result();
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

	function Get_post($form_data) {
		$this->db->select('posts.id, posts.message');
		$this->db->from('posts');
		$this->db->where($form_data);

		return $this->db->get()->result();
	}

	function Edit_post($post_data, $form_data) {
		$this->db->where($post_data);
		$this->db->update('posts', $form_data);

                if ($this->db->affected_rows() == '1')
                {
                        return TRUE;
                }

                return FALSE;
	}

	function Delete_post($form_data) {
                $this->db->delete('posts', $form_data);

                if ($this->db->affected_rows() == '1')
                {
                        return TRUE;
                }

                return FALSE;
        }

}
?>
