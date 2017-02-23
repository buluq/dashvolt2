<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
	public function index() {
		$data['site_name']   = $this->config->item('site_name');
		$data['parent_menu'] = $this->config->item('parent_menu');
		$data['panel_menu']  = $this->config->item('menu');
		$data['page_navbar'] = $this->load->view('parts/navbar', $data, true);
		$data['page_layout'] = $this->load->view('layouts/homepage', $data, true);

		$this->load->view('base', $data);
	}
}

/* End of file: Page.php */
