<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends SA_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function brochure_request() {
		$data = $this->set_data('brochure_status');
		$this->generate_page($data);
	}

	public function inquiry() {
		$data = $this->set_data('inquiry_status');
		$this->generate_page($data);
	}

	public function web_tech() {
		$data = $this->set_data('web_support');
		$this->generate_page($data);
	}
}

/* End of file: Page.php */
