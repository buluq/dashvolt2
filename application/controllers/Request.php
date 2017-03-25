<?php

/**
 * Dashvolt 2 Request route controller
 *
 * Provide route controller for Request service.
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
 * @since dcf152299e2f6f15d459a204179101e8a0940046
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Request service controller
 *
 * This class handle request submission services.
 *
 * @since dcf152299e2f6f15d459a204179101e8a0940046
 * @since 804727c965c118d748630dfc55f0ce95d842f290 Change parent to SA_Controller
 */
class Request extends SA_Controller {

	/**
	 * Processing brochure request submission request
	 *
	 * Generate page for displaying brochure request submission document.
	 *
	 * @since dcf152299e2f6f15d459a204179101e8a0940046
	 */
	public function brochure() {
		$data = $this->set_data('brochure_request');
		$this->generate_page($data);
	}

	/**
	 * Processing inquiry request submission request
	 *
	 * Generate page for displaying inquiry request submission document.
	 *
	 * @since dcf152299e2f6f15d459a204179101e8a0940046
	 */
	public function inquiry() {
		$data = $this->set_data('inquiry_request');
		$this->generate_page($data);
	}

	/**
	 * Processing web technical support request submission request
	 *
	 * Generate page for displaying web technical support request submission document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function web_tech() {
		$data = $this->set_data('web_support_request');
		$this->generate_page($data);
	}

	/**
	 * Processing seo support request submission request
	 *
	 * Generate page for displaying seo support request submission document.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 */
	public function seo() {
		$data = $this->set_data('seo_support_request');
		$this->generate_page($data);
	}

}

/* End of file: Page.php */
