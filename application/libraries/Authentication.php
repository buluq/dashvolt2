<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication {
	private $framework;

	public function __construct() {
		$this->framework =& get_instance();

		$this->framework->load->library(array('session', 'form_validation'));
	}

	public function authenticate($username, $password) {
		if (empty($username) || empty($password)) {
			return false;
		}
		else {
			$this->framework->db->where('username', $username);
			$user = $this->framework->db->get('users')->row();

			return (bool) password_verify($password, $user->password);
		}
	}

	public function is_logged_in() {
		return (bool) $this->framework->session->userdata('username');
	}

	public function set_session($user) {
		$session_data = array(
			'username' => $user->username,
			'user_id'  => $user->id,
			'role_id'  => $user->role_id,
		);

		$this->framework->session->set_userdata($session_data);

		return true;
	}

	public function validate_form() {
		$this->framework->form_validation->set_rules('username', 'Email', 'required');
		$this->framework->form_validation->set_rules('password', 'Password', 'required');

		return (bool) $this->framework->form_validation->run();
	}
}

/* End of file: Authentication.php */
