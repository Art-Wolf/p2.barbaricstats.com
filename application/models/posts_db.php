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

	function Search($form_data) {
		$this->db->select('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp, COUNT(k1.post_id) karma_up, COUNT(k2.post_id) karma_down');
                $this->db->from('posts');
                $this->db->join('users', 'posts.user_id = users.id');
                $this->db->join('karma k1', "posts.id = k1.post_id AND k1.karma_ind = 'U'", 'left outer');
                $this->db->join('karma k2', "posts.id = k2.post_id AND k2.karma_ind = 'D'", 'left outer');

		$terms = explode(' ', $form_data['term']);

		$where = "";

		foreach($terms as $key => $value) {

			if (empty($where)) {
				$where = "posts.message LIKE '%" . $value . "%' ";
			} else {
                		$where .= "OR posts.message LIKE '%" . $value . "%' ";
			}
		}
		
		$this->db->where($where);

                $this->db->group_by('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp');
                $this->db->order_by('posts.id ASC');

                return $this->db->get()->result();
	}

	function Get_posts() {
		$this->db->select('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp, COUNT(k1.post_id) karma_up, COUNT(k2.post_id) karma_down');
                $this->db->from('posts');
                $this->db->join('users', 'posts.user_id = users.id');
		$this->db->join('karma k1', "posts.id = k1.post_id AND k1.karma_ind = 'U'", 'left outer');
		$this->db->join('karma k2', "posts.id = k2.post_id AND k2.karma_ind = 'D'", 'left outer');
		$this->db->group_by('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp');
		$this->db->order_by('posts.id ASC');

		return $this->db->get()->result();
	}

	function Get_user_posts($form_data) {
		$this->db->select('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp, COUNT(k1.post_id) karma_up, COUNT(k2.post_id) karma_down');
                $this->db->from('posts');
                $this->db->join('users', 'posts.user_id = users.id');
                $this->db->join('karma k1', "posts.id = k1.post_id AND k1.karma_ind = 'U'", 'left outer');
                $this->db->join('karma k2', "posts.id = k2.post_id AND k2.karma_ind = 'D'", 'left outer');
		$this->db->where($form_data);
                $this->db->group_by('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp');
                $this->db->order_by('posts.id ASC');

		return $this->db->get()->result();
	}

	function Get_followed_posts($form_data) {
		$this->db->select('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp, COUNT(k1.post_id) karma_up, COUNT(k2.post_id) karma_down');
                $this->db->from('posts');
                $this->db->join('users', 'posts.user_id = users.id');
		$this->db->join('follows', 'follows.followed_id = users.id');
                $this->db->join('karma k1', "posts.id = k1.post_id AND k1.karma_ind = 'U'", 'left outer');
                $this->db->join('karma k2', "posts.id = k2.post_id AND k2.karma_ind = 'D'", 'left outer');
                $this->db->where($form_data);
                $this->db->group_by('posts.id, posts.user_id, users.user_name, posts.message, posts.insert_tmstmp');
                $this->db->order_by('posts.id ASC');

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
