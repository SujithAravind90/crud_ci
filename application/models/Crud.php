<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Crud extends CI_Model
{
	public function get_records($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join('comments', 'posts.id = comments.post_id');
		$query = $this->db->get()->result();
		return $query;
	}
	public function find_record_by_id($table, $id)
	{
		$result = $this->db->get_where($table, ['id' => $id])->row();
		return $result;
	}
	// ---------------------------------------------------------------------------------------
	public function getLastInsertID($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}
	// -------------------------------------------------------------------------------------------
	public function update($table, $id, $data)
	{
		
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

	public function update_comments($post_id, $data)
	{
		
		$this->db->where('post_id', $post_id);
		$this->db->update('comments', $data);
	}
	// -----------------------------------------------------------------------------------------------
	public function delete($table, $id)
	{
		$result = $this->db->delete($table, ['id' => $id]);
		return $result;
	}
	public function delete_comments($table2, $id)
	{
		$result = $this->db->delete($table2, ['id' => $id]);
		return $result;
	}
	// -----------------------------------------------------------------------------

}
