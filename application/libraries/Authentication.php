<?php

/**
 * Dashvolt 2 authentication system
 *
 * The authentication system handle validation, authentication, and
 * state checking for user of Dashvolt 2.
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
 * @subpackage Library
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashvolt 2 authentication class
 *
 * This class handle user authentication for the entire program. It can be used for:
 * - login system
 * - set user session
 * - check user state
 *
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */
class Authentication {

	/**
	 * Framework singleton reference.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 * @access private
	 * @var object $framework
	 */
	private $framework;

	/**
	 * Constructor method for class
	 *
	 * Initializing class dependency before its use. Here, we initializing
	 * 1. Framework reference
	 * 2. Library which class depend to.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @global object $framework
	 */
	public function __construct() {

		/* Initializing framework reference.
		 */
		$this->framework =& get_instance();

		/* Initializing library which class depend to.
		 */
		$this->framework->load->library(array('session', 'form_validation'));

	}

	/**
	 * User authentication method
	 *
	 * Check the user credential that sent by login form.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @global object $framework
	 *
	 * @param string $username User username to check.
	 * @param string $password User password to check.
	 * @return boolean Verification result.
	 */
	public function authenticate($username, $password) {

		/* Check the required parameter.
		 * If the required parameter is found then verify it.
		 */
		if (empty($username) || empty($password)) {
			return false;
		}
		else {

			/* Read database data for given username record.
			 */
			$this->framework->db->where('username', $username);
			$user = $this->framework->db->get('users')->row();

			/* Verify its password and return the result.
			 */
			return (bool) password_verify($password, $user->password);

		}

	}

	/**
	 * Check user state
	 *
	 * Get the user session data for current user.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @global object $framework
	 *
	 * @return boolean User session data existance.
	 */
	public function is_logged_in() {
		return (bool) $this->framework->session->userdata('username');
	}

	/**
	 * Set user session data
	 *
	 * Give session for logged in user after passing the authentication system.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @global object $framework
	 *
	 * @param object $user User data from database.
	 */
	public function set_session($user) {

		/* Create session data based on user data.
		 */
		$session_data = array(
			'username' => $user->username,
			'user_id'  => $user->id,
			'role_id'  => $user->role_id,
		);

		/* Create session and store it.
		 */
		$this->framework->session->set_userdata($session_data);

	}

	/**
	 * Validate login form
	 *
	 * Make sure the login form data is valid and the required data is found.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @global object $framework
	 *
	 * @return boolean Validation result.
	 */
	public function validate_form() {

		/* Set the validation rule for login form.
		 */
		$this->framework->form_validation->set_rules('username', 'Email', 'required');
		$this->framework->form_validation->set_rules('password', 'Password', 'required');

		/* Validate the form data based on validation rule then return the result.
		 */
		return (bool) $this->framework->form_validation->run();

	}

}

/* End of file: Authentication.php */
