<?php


class Post_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE) {
			if($limit) {
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE) {
			$this->db->select('P.*, C.id as category_id, C.name');
			$this->db->from('posts as P');
			$this->db->join('categories as C', 'P.category = C.id');
			$this->db->order_by('P.id', 'DESC');
			return $this->db->get()->result_array();
			}
			$this->db->select('P.*, C.id as category_id, C.name, U.id as userId, U.username');
			$this->db->from('posts as P');
			$this->db->join('categories as C', 'P.category = C.id');
			$this->db->join('users as U', 'P.user_id = U.id', 'left');
			$this->db->where('P.slug', $slug);
			return $this->db->get()->row_array();
//			$this->db->order_by('posts.id', 'DESC');
//			$this->db->join('categories', 'categories.id = posts.category');
//			if($slug === FALSE) {
//				$query = $this->db->get('posts');
//				return $query->result_array();
//			}
//			$query = $this->db->get_where('posts', array('slug' => $slug));
//			return $query->row_array();
		}
		public function create_post($post_image) {
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category' => $this->input->post('category_id'),
				'user_id' => $this->session->userdata('user_id'),
				'post_image' => $post_image
			);
			return $this->db->insert('posts', $data);
		}
		public function delete_post($id) {
			$this->db->where('id', $id);
			$req = $this->db->delete('posts');
			return $req;
		}
		public function update_post() {
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category' => $this->input->post('category_id')
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}
		public function get_categories() {
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}
	public function get_posts_by_category($category_id) {
		$this->db->select('P.*, C.id as category_id, C.name');
		$this->db->from('posts as P');
		$this->db->join('categories as C', 'P.category = C.id');
		$this->db->order_by('P.id', 'DESC');

		$this->db->where('category', $category_id);
		return $this->db->get()->result_array();

		$this->db->select('P.*');
		$this->db->from('posts as P');
		$this->db->where('category', $category_id);
		return $this->db->get()->result_array();
	}
}
