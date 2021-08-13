<?php


class Comment_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		public function create_comment($post_id) {
			$data = array(
				'post_id' => $post_id,
				'username' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('comment')
			);
			return $this->db->insert('comments', $data);
		}
		public function get_comments($post_id) {
			$this->db->order_by('created_at', 'DESC');
			$query = $this->db->get_where('comments', array('post_id' => $post_id));
			return $query->result_array();
		}
}
