<?php

/**
 * Dashvolt 2 Journal route controller
 *
 * Provide route controller for Journal service.
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
 * Journal service controller
 *
 * This class handle journal record submission services.
 *
 * @since 804727c965c118d748630dfc55f0ce95d842f290
 */
class Journal extends SA_Controller {

	/**
	 * Processing web post journal request
	 *
	 * Generate page for displaying web post journal document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function web_post() {
		$data = $this->set_data('web_post_journal');
		$this->generate_page($data);
	}

	/**
	 * Processing customer service journal request
	 *
	 * Generate page for displaying customer service journal document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function customer_services() {
		$data = $this->set_data('cr_journal');
		$this->generate_page($data);
	}

	/**
	 * Processing follow up journal request
	 *
	 * Generate page for displaying follow up journal document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function follow_up() {
		$data = $this->set_data('follow_up_journal');
		$this->generate_page($data);
	}

}

/* End of file: Page.php */
