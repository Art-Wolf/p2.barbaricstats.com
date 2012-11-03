<?php

class Karma_db extends CI_Model {

	function Up_karma($form_data) {
		$this->db->select('karma.post_id');
                $this->db->from('karma');
                $this->db->where($form_data);

                if(count($this->db->get()->result()) > 0) {

			$this->db->where($form_data);
			$this->db->update('karma', array('karma.karma_ind' => 'U'));

                	return TRUE;
		} else {	
			$form_data['karma.karma_ind'] = 'U';
			$this->db->insert('karma', $form_data);

			if ($this->db->affected_rows() == '1')
                        {
                                return TRUE;
                        }
		}

                return FALSE;
	}

	function Down_karma($form_data) {
                $this->db->select('karma.post_id');
                $this->db->from('karma');
                $this->db->where($form_data);

                if(count($this->db->get()->result()) > 0) {
			$this->db->where($form_data);
                        $this->db->update('karma', array('karma.karma_ind' => 'D'));

                        return TRUE;
                } else {
                        $form_data['karma.karma_ind'] = 'D';
                        $this->db->insert('karma', $form_data);

                        if ($this->db->affected_rows() == '1')
                        {
                                return TRUE;
                        }
                }

                return FALSE;
	}
}
?>
