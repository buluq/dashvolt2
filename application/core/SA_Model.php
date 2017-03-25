<?php

/**
 * Dashvolt 2 main model
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
 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Main controller
 *
 * This class is parent model for Dashvolt 2. Used for basic CRUD operation.
 *
 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
 */
class SA_Model extends CI_Model {

	/**
	 * Constructor method for class
	 *
	 * Initializing class dependency before its use.
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 */
	public function __construct() {

		/* Parent class constructor.
		 */
		parent::__construct();

		/* Initializing library which class depend to.
		 */
		$this->load->database();

	}

	/**
	 * Retrieve record count
	 *
	 * @since ee38e4bbec3f28dd4f0eeb04cc6b00dadfb12e01
	 * @access protected
	 *
	 * @param string $column Table column name.
	 * @param string $value Record to be search.
	 * @param string $table Table name.
	 * @return integer Record count.
	 */
	protected function count_by($column, $value, $table) {

		/* Prepare record selection query.
		 */
		$this->db->where($column, $value);
		$this->db->from($table);

		/* Retrieve , count, and return the found record.
		 */
		return $this->db->count_all_results();

	}

	/**
	 * Delete database record based on content of the record
	 *
	 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
	 * @access protected
	 *
	 * @param string $column Table column name.
	 * @param string $value Record to be search.
	 * @param string $table Table name.
	 */
	protected function delete($column, $value, $table) {

		/* Select record based on supplied criteria.
		 */
		$this->db->where($column, $value);

		/* Delete found record.
		 */
		$this->db->delete($table);

	}

	/**
	 * Delete database record based on record id
	 *
	 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
	 * @access protected
	 *
	 * @param integer $id Record ID.
	 * @param string $table Table name.
	 */
	protected function delete_by_id($id, $table) {

		/* Select record based on supplied ID.
		 */
		$this->db->where('id', $id);

		/* Delete found record.
		 */
		$this->db->delete($table);

	}

	/**
	 * Retrieve all table record
	 *
	 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
	 * @access protected
	 *
	 * @param string $table Table name.
	 * @return mixed Table record.
	 */
	protected function get_all($table) {
		return $this->db->get($table)->result();
	}

	/**
	 * Retrieve record based on record ID
	 *
	 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
	 * @access protected
	 *
	 * @param integer $id Record ID.
	 * @param string $table Table name.
	 * @return mixed Table record.
	 */
	protected function get_by_id($id, $table) {
		$this->db->where('id', $id);
		return $this->db->get($table)->row();
	}

	/**
	 * Retrieve record based on record content
	 *
	 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
	 * @access protected
	 *
	 * @param string $column Table column name.
	 * @param mixed $value Content to be search.
	 * @param string $table Table name.
	 * @return mixed Table record.
	 */
	protected function get_by_filter($column, $value, $table) {
		$this->db->where($column, $value);
		return $this->db->get($table)->row();
	}

	/**
	 * Create new record
	 *
	 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
	 * @access protected
	 *
	 * @param mixed $data Data to be recorded.
	 * @param string $table Table name.
	 */
	protected function insert($data, $table) {
		$this->db->insert($table, $data);
	}

	/**
	 * Update record based on its content
	 *
	 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
	 * @access protected
	 *
	 * @param mixed $data Data to be recorded.
	 * @param string $column Table column name.
	 * @param string $value Record to be search.
	 * @param string $table Table name.
	 */
	protected function update($data, $column, $value, $table) {
		$this->db->where($column, $value);
		$this->db->update($table, $data);
	}

	/**
	 * Update record based on its ID
	 *
	 * @since 2a8cc3d7f68a8b7d3f20f86003dc39f9472bb418
	 * @access protected
	 *
	 * @param integer $id Record ID.
	 * @param mixed $data Data to be recorded.
	 * @param string $table Table name.
	 */
	protected function update_by_id($id, $data, $table) {
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

}

/* End of file: SA_Model.php */
