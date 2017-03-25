<?php

/**
 * Dashvolt 2 Status route controller
 *
 * Provide route controller for Status service.
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
 * @since 804727c965c118d748630dfc55f0ce95d842f290
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Status service controller
 *
 * This class handle read-only status data provider services.
 *
 * @since 804727c965c118d748630dfc55f0ce95d842f290
 */
class Status extends SA_Controller {

	/**
	 * Processing brochure request status request
	 *
	 * Generate page for displaying brochure request status document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function brochure_request() {
		$data = $this->set_data('brochure_status');
		$this->generate_page($data);
	}

	/**
	 * Processing inquiry request status request
	 *
	 * Generate page for displaying inquiry request status document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function inquiry() {
		$data = $this->set_data('inquiry_status');
		$this->generate_page($data);
	}

	/**
	 * Processing web technical support request status request
	 *
	 * Generate page for displaying web technical support request status document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function web_tech() {
		$data = $this->set_data('web_support');
		$this->generate_page($data);
	}

}

/* End of file: Page.php */
