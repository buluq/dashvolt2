<?php

/**
 * Dashvolt 2 main controller
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
 * @subpackage Core
 * @since 804727c965c118d748630dfc55f0ce95d842f290
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main controller
 *
 * This class is parent controller for Dashvolt 2.
 *
 * @since 804727c965c118d748630dfc55f0ce95d842f290
 */
class SA_Controller extends CI_Controller {

	/**
	 * Generate page
	 *
	 * Generate requested page with suplied data.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 * @access protected
	 *
	 * @param mixed[] $data Page data.
	 * @param string $base Template file.
	 */
	protected function generate_page($data, $base = 'base') {
		$this->load->view($base, $data);
	}

	/**
	 * Get page slug
	 *
	 * Generate current page slug name.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 * @access protected
	 *
	 * @param string $function Controller method name.
	 * @return string Page slug name.
	 */
	protected function get_slug($function) {

		/* Get class and method name for requested page.
		 */
		$class_name  = get_class($this);
		$method_name = $function;

		/* Generate and return page slug.
		 */
		return strtolower("$class_name $method_name");

	}

	/**
	 * Prepare page data
	 *
	 * Generate required page data. Retrieve Google document file URL to be served.
	 * Merging additional data if any.
	 *
	 * @since 804727c965c118d748630dfc55f0ce95d842f290
	 * @access protected
	 *
	 * @param string $service Dashvolt 2 service slug.
	 * @param string $layout Page layout name.
	 * @param mixed[] $additional Additional data to be supplied for page.
	 * @return mixed[] Required page data.
	 */
	protected function set_data($service = '', $layout = 'dashboard', $additional = '') {

		/* Prepare base page data.
		 */
		$data['site_name']   = $this->config->item('site_name');
		$data['parent_menu'] = $this->config->item('parent_menu');
		$data['panel_menu']  = $this->config->item('menu');

		/* Retrieve Google document file URL to be served.
		 */
		if ($service !== '') {
			$data['file']        = $data['panel_menu'][$service]['file'];
			$data['note']        = $data['panel_menu'][$service]['note'];
		}

		/* Merge additional data if any.
		 */
		if ($additional !== '') {
			$data = array_merge($data, $additional);
		}

		/* Prepare page layout data.
		 */
		$data['page_navbar'] = $this->load->view('parts/navbar', $data, true);
		$data['page_layout'] = $this->load->view('layouts/' . $layout, $data, true);

		/* Return generated data.
		 */
		return $data;

	}

	/**
	 * Prepare page data
	 *
	 * Generate required page data. Retrieve Google document file URL to be served.
	 * Merging additional data if any.
	 * NOTE: to be used for native/non-Google Dashvolt 2 services.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 * @access protected
	 *
	 * @param mixed[] $page_data Additional page data.
	 * @param string $layout Page layout name.
	 * @return mixed[] Required page data.
	 */
	protected function set_page_data($page_data = array(), $layout = 'dashboard') {

		/* Prepare base page data.
		 */
		$data['site_name']   = $this->config->item('site_name');
		$data['parent_menu'] = $this->config->item('parent_menu');
		$data['panel_menu']  = $this->config->item('menu');

		/* Merge additional data if any.
		 */
		if ($page_data !== '') {
			$data = array_merge($data, $page_data);
		}

		/* Prepare page layout data.
		 */
		$data['page_navbar'] = $this->load->view('parts/navbar', $data, true);
		$data['page_layout'] = $this->load->view('layouts/' . $layout, $data, true);

		/* Return generated data.
		 */
		return $data;

	}

}

/* End of file: Controller.php */
