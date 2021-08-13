<?php


class Category_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		public function get_categories() {
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}
		public function create_category() {
			$data = array(
				'name' => $this->input->post('name')
			);
			return $this->db->insert('categories', $data);
		}
		public function get_category($id) {
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row();
		}







		public function delete_category($id) {
			$this->db->where('id', $id);
			$req = $this->db->delete('categories');
			return $req;
		}
		public function update_category() {
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category' => $this->input->post('category_id')
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

}
