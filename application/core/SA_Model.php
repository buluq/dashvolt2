<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SA_Model extends CI_Model {

	protected function delete($column, $value, $table) {
		$this->db->where($column, $value);
		$this->db->delete($table);
	}

	protected function delete_by_id($id, $table) {
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

	protected function get_all($table) {
		return $this->db->get($table)->result();
	}

	protected function get_by_id($id, $table) {
		$this->db->where('id', $id);
		return $this->db->get($table)->row();
	}

	protected function get_by_filter($column, $value, $table) {
		$this->db->where($column, $value);
		return $this->db->get($table)->row();
	}

	protected function insert($data, $table) {
		$this->db->insert($table, $data);
	}

	protected function update($data, $column, $value, $table) {
		$this->db->where($column, $value);
		$this->db->update($table, $data);
	}

	protected function update_by_id($id, $data, $table) {
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

}

/* End of file: SA_Model.php */
