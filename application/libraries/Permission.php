<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission {
	private $framework;

	public function __construct() {
		$this->framework =& get_instance();

		$this->framework->load->library(array('session'));
	}

	public function get_permission_read($slug) {
		$module_id  = $this->get_module_id($slug);
		$permission = $this->get_permission($module_id);

		return (bool) $permission->read_module;
	}

	public function get_permission_write($slug) {
		$module_id  = $this->get_module_id($slug);
		$permission = $this->get_permission($module_id);

		return (bool) $permission->write_module;
	}

	private function get_module_id($slug) {
		$this->framework->db->where('label', $slug);
		$module = $this->framework->db->get('modules')->row();
		return $module->id;
	}

	private function get_permission($module_id) {
		$role_id = $this->framework->session->role_id;

		return $this->get_user_permission($role_id, $module_id);
	}

	private function get_user_permission($role_id, $module_id) {
		$this->framework->db->where('role_id', $role_id);
		$this->framework->db->where('module_id', $module_id);

		return $this->framework->db->get('permissions')->row();
	}
}

/* End of file: Permission.php */
