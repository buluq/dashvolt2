<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends SA_Controller {

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
	public function web_post() {
		$data = $this->set_data('web_post_journal');
		$this->generate_page($data);
	}

	public function customer_services() {
		$data = $this->set_data('cr_journal');
		$this->generate_page($data);
	}

	public function follow_up() {
		$data = $this->set_data('follow_up_journal');
		$this->generate_page($data);
	}
}

/* End of file: Page.php */
