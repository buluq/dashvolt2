<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends SA_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->library('authentication');

		if ($this->authentication->is_logged_in() !== true) {
			redirect(site_url($this->config->item('login_page')));
		}
	}

	public function index() {
		echo 'Helo, you are here.';
	}
}

/* End of file: Panel.php */
