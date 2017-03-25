<?php

/**
 * Dashvolt 2 /user route controller
 *
 * Provide route controller for current user dashboard.
 *
 * Copyright (c) 2017, Sunu Haeriadi
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package Dashvolt2
 * @subpackage Controller
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User dashboard controller
 *
 * This class handle current user dashboard logic. It is used for:
 * - user login process
 * - user logout process
 * - generate login page
 *
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */
class User extends SA_Controller {

	/**
	 * Generate login page
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 */
	public function index() {

		/* Prepare login page data.
		 */
		$data = $this->set_page_data('', 'loginpage');

		/* Generate login page.
		 */
		$this->generate_page($data);

	}

	/**
	 * Process user login request
	 *
	 * Validate login form data to be authenticated with database record.
	 * Redirect the user to its page based on authentication status.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 */
	public function login() {

		/* Initializing login system dependency.
		 */
		$this->load->library(array('form_validation', 'authentication'));
		$this->load->model('users');

		/* Validate login form data that sent by user.
		 */
		$validity = $this->authentication->validate_form();

		/* Process the data to be authenticated. Redirect to the correct page
		 * based on authentication status.
		 */
		if ($validity == true) {

			/* Get the login form data.
			 */
			$email          = $this->input->post('username');
			$password       = $this->input->post('password');

			/* Authenticate the data.
			 */
			$authentication = $this->authentication->authenticate($username, $password);

			/* Process user login if authentication is passed.
			 * Redirect the user based on authentication status.
			 */
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

	/**
	 * Process user logout request
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 */
	public function logout() {

		/* Initializing login system dependency.
		 */
		$this->load->model('users');

		/* Process user logout from system then redirect them to login page.
		 */
		$this->users->logout();
		redirect(site_url($this->config->item('login_page')));

	}
}

/* End of file: User.php */
