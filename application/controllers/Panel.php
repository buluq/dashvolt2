<?php

/**
 * Dashvolt 2 /panel route controller
 *
 * Provide route controller for module dashboard.
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
 * Module dashboard controller
 *
 * This class handle module dashboard logic. It is used for processing
 * and providing Dashvolt 2 services to user.
 *
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */
class Panel extends SA_Controller {

	/**
	 * Constructor method for class
	 *
	 * Initializing class dependencies befor its usage and make sure
	 * that current user have access permission for its module.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 */
	public function __construct() {

		/* Parent class constructor.
		 */
		parent::__construct();

		/* Initializing class dependencies.
		 */
		$this->load->library('authentication');

		/* Check if current user is logged in.
		 */
		if ($this->authentication->is_logged_in() !== true) {
			redirect(site_url($this->config->item('login_page')));
		}

	}

	/**
	 * Generate current user main panel
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 */
	public function index() {
		echo 'Helo, you are here.';
	}

}

/* End of file: Panel.php */
