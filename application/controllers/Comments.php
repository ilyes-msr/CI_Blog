<?php

class Comments extends CI_Controller {
	public function create($post_id) {
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		$this->form_validation->set_error_delimiters('<div class="comments-errors">', '</div>');

		$slug = $this->input->post('slug');
		$data['post'] = $this->post_model->get_posts($slug);
		$post_id = isset($data['post']['id']) ? $data['post']['id'] : null;
		$data['comments'] = $this->comment_model->get_comments($post_id);
		$data['newComment'] = array(
			'username' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'body' => $this->input->post('comment')
		);
		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		} else {
			$this->comment_model->create_comment($post_id);
			redirect('posts/'. $slug);
		}
	}
}
