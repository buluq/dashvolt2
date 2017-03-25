<?php

/**
 * Dashvolt 2 users table model
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
 * @subpackage Model
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Users table model
 *
 * Handle storing, retrieving, and modifying users table data record.
 *
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */
class Users extends SA_Model {

	/**
	 * Check for username existance
	 *
	 * Counting the record which have specified username.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @param string $username Username to be checked.
	 * @return boolean Username existance.
	 */
	public function check_username($username) {

		/* Check there are any username data supplied.
		 */
		if (empty($username)) {
			return false;
		}

		/* Counting the users table record which have specified username.
		 */
		$record_count = $this->count_by('username', $username, 'users');

		/* Return the record existance.
		 */
		if ($record_count > 0) {
			return true;
		}
		else {
			return false;
		}

	}

	/**
	 * Processing user login
	 *
	 * Retrieve user data record based on supplied username
	 * and create logged in user session.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @param string $username Supplied username.
	 * @param boolean $status Username record existance status.
	 * @return boolean Login processing status.
	 */
	public function login($username, $status) {

		/* Initializing dependencies.
		 */
		$this->load->library(array('session'));

		/* Create session for logged in user. And return the login processing status
		 * is done.
		 */
		if ($status === true) {

			/* Retrieve user data record and set the user session based on
			 * record data.
			 */
			$user = $this->get_by_filter('username', $username, 'users');
			$this->authentication->set_session($user);

			/* Return the status is DONE.
			 */
			return true;

		}

	}

	/**
	 * Processing user logout
	 *
	 * Destroy current user session and give them guest session
	 * after logout from system.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @return boolean Logout processing status.
	 */
	public function logout() {

		/* Initializing dependencies.
		 */
		$this->load->library('session');

		/* Destroy current user session then generate guest session
		 */
		$this->session->sess_destroy();
		$this->session->sess_regenerate(true);

		/* Return the status is DONE.
		*/
		return true;

	}

}

/* End of file: Users.php */
