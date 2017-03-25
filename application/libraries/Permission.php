<?php

/**
 * Dashvolt 2 user permission system
 *
 * User permission system handle user access privilege for module, page, or feature
 * that provided by Dashvolt 2.
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
 * @subpackage Library
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashvolt 2 permission class
 *
 * This class handle user access privilege by provide
 * - user permission checker
 * - user permission table reader
 *
 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
 */
class Permission {

	/**
	 * Framework singleton reference.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 * @access private
	 * @var object $framework
	 */
	private $framework;

	/**
	 * Constructor method for class
	 *
	 * Initializing class dependency before its use. Here, we initializing
	 * 1. Framework reference
	 * 2. Library which class depend to.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @global object $framework
	 */
	public function __construct() {

		/* Initializing framework reference.
		 */
		$this->framework =& get_instance();

		/* Initializing library which class depend to.
		 */
		$this->framework->load->library(array('session'));

	}

	/**
	 * Retrive read permission
	 *
	 * Check user read access permission for Dashvolt 2 module.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @param string $slug Module slug name.
	 * @return boolean Read access status.
	 */
	public function get_permission_read($slug) {

		/* Get module ID and module permission for current user.
		 */
		$module_id  = $this->get_module_id($slug);
		$permission = $this->get_permission($module_id);

		/* Return the user access.
		 */
		return (bool) $permission->read_module;

	}

	/**
	 * Retrive write permission
	 *
	 * Check user write access permission for Dashvolt 2 module.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 *
	 * @param string $slug Module slug name.
	 * @return boolean Write access status.
	 */
	public function get_permission_write($slug) {

		/* Get module ID and module permission for current user.
		 */
		$module_id  = $this->get_module_id($slug);
		$permission = $this->get_permission($module_id);

		/* Return the user access.
		 */
		return (bool) $permission->write_module;

	}

	/**
	 * Retrive module ID
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 * @access private
	 *
	 * @param string $slug Module slug name.
	 * @return string Module ID.
	 */
	private function get_module_id($slug) {

		/* Retrive module ID based on slug name from database.
		 */
		$this->framework->db->where('label', $slug);
		$module = $this->framework->db->get('modules')->row();

		/* Return the module ID.
		 */
		return $module->id;

	}

	/**
	 * Retrive module permission
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 * @access private
	 *
	 * @global object $framework
	 *
	 * @param string $module_id Module ID.
	 * @return object User permission for current module.
	 */
	private function get_permission($module_id) {

		/* Get current user role ID.
		 */
		$role_id = $this->framework->session->role_id;

		/* Return user permission record for current module.
		 */
		return $this->get_user_permission($role_id, $module_id);

	}

	/**
	 * Retrive user permission
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 * @access private
	 *
	 * @global object $framework
	 *
	 * @param string $role_id User role ID.
	 * @param string $module_id Module ID.
	 * @return object User permission record.
	 */
	private function get_user_permission($role_id, $module_id) {

		/* Create query to retrive current user access for module.
		 */
		$this->framework->db->where('role_id', $role_id);
		$this->framework->db->where('module_id', $module_id);

		/* Retrive and return the user permission.
		 */
		return $this->framework->db->get('permissions')->row();

	}

}

/* End of file: Permission.php */
