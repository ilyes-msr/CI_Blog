<?php

class Users extends CI_Controller {

	public function register() {
		$data['title'] = 'Sign Up';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
		$this->form_validation->set_error_delimiters('<div class="user-registeration-errors">', '</div>');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		} else {
			$enc_pass = md5($this->input->post('password'));
			$this->user_model->register($enc_pass);
			$this->session->set_flashdata('user_registered', 'You are now registered and can log in');
			redirect('posts');
		}
	}

	public function login() {
		$data['title'] = 'Log In';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="user-login-errors">', '</div>');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$user_id = $this->user_model->login($username, $password);
			if ($user_id) {
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_logged_in', 'You are now logged in');
				redirect('posts');
			} else {
				$this->session->set_flashdata('wrong_credientials', 'Username or password are wrong');
				redirect('users/login');
			}
		}
	}
	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('user_logged_out', 'You are now logged out');
		redirect('users/login');

	}

	function check_username_exists($username) {
		$this->form_validation->set_message('check_username_exists', 'That username is taken, please choose a different one');
		if($this->user_model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}
	function check_email_exists($email) {
		$this->form_validation->set_message('check_email_exists', 'That email is taken, please choose a different one');
		if($this->user_model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}
}
