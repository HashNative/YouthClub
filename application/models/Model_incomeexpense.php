<?php 

class Model_incomeexpense extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getIncomeExpenseData($userId = null)
	{
		if($userId) {
			$sql = "SELECT * FROM incomeexpense WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM incomeexpense WHERE id != ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}


	public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('incomeexpense', $data);

			$user_id = $this->db->insert_id();

			return ($create == true) ? true : false;
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('incomeexpense', $data);

		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('incomeexpense');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
	
}