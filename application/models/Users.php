<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends SA_Model {
	public function check_username($username) {
		if (empty($username)) {
			return false;
		}

		$record_count = $this->count_by('username', $username, 'users');

		if ($record_count > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function login($username, $status) {
		$this->load->library(array('session'));

		if ($status === true) {
			$user = $this->get_by_filter('username', $username, 'users');
			$this->authentication->set_session($user);

			return true;
		}
	}

	public function logout() {
		$this->load->library('session');

		$this->session->sess_destroy();
		$this->session->sess_regenerate(true);

		return true;
	}
}

/* End of file: Users.php */
