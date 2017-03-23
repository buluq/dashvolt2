<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends SA_Controller {
	public function index() {
		$data = $this->set_page_data('', 'loginpage');
		$this->generate_page($data);
	}

	public function login() {
		$this->load->library(array('form_validation', 'authentication'));
		$this->load->model('users');

		$validity = $this->authentication->validate_form();

		if ($validity == true) {
			$email          = $this->input->post('username');
			$password       = $this->input->post('password');
			$authentication = $this->authentication->authenticate($username, $password);

			if ($this->users->login($email, $authentication)) {
				$this->users->login($email, $authentication);

				redirect(site_url($this->config->item('default_panel')));
			}
			else {
				redirect(site_url($this->config->item('login_page')));
			}
		}
		else {
			redirect(site_url($this->config->item('login_page')));
		}
	}

	public function logout() {
		$this->load->model('users');

		$this->users->logout();
		redirect(site_url($this->config->item('login_page')));
	}
}

/* End of file: User.php */
