<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SA_Controller extends CI_Controller {
	protected function set_data($service = '', $layout = 'dashboard', $additional = '') {
		$data['site_name']   = $this->config->item('site_name');
		$data['parent_menu'] = $this->config->item('parent_menu');
		$data['panel_menu']  = $this->config->item('menu');

		if ($service !== '') {
			$data['file']        = $data['panel_menu'][$service]['file'];
			$data['note']        = $data['panel_menu'][$service]['note'];
		}

		if ($additional !== '') {
			$data = array_merge($data, $additional);
		}

		$data['page_navbar'] = $this->load->view('parts/navbar', $data, true);
		$data['page_layout'] = $this->load->view('layouts/' . $layout, $data, true);

		return $data;
	}

	protected function generate_page($data, $base = 'base') {
		$this->load->view($base, $data);
	}
}

/* End of file: Controller.php */
