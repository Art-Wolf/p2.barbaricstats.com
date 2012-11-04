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

	function Weekly_stats() {
		$query = "SELECT DATE_FORMAT(karma.timestamp, '%W') day, COUNT(*) total, COUNT(CASE WHEN karma_ind = 'U' THEN 1 END) up_count, COUNT(CASE WHEN karma_ind = 'D' THEN 1 END) down_count FROM karma WHERE karma.timestamp >= NOW() - INTERVAL 7 DAY GROUP BY DATE_FORMAT(karma.timestamp, '%W') ORDER BY timestamp DESC";

		return $this->db->query($query)->result();
	}
}
?>
