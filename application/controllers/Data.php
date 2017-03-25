<?php

/**
 * Dashvolt 2 Data route controller
 *
 * Provide route controller for Data service.
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
 * Data service controller
 *
 * This class handle read-only data provider services.
 *
 * @since 804727c965c118d748630dfc55f0ce95d842f290
 */
class Data extends SA_Controller {

	/**
	 * Processing data product request
	 *
	 * Generate page for displaying product data document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function product() {
		$data = $this->set_data('product_data');
		$this->generate_page($data);
	}

	/**
	 * Processing data inquiry request
	 *
	 * Generate page for displaying inquiry data document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function inquiry() {
		$data = $this->set_data('inquiry_data');
		$this->generate_page($data);
	}

	/**
	 * Processing data web post request
	 *
	 * Generate page for displaying web post data document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function web_post() {
		$data = $this->set_data('post_data');
		$this->generate_page($data);
	}

}

/* End of file: Page.php */
