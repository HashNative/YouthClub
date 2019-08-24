<?php 

class Model_chit extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getChitData($userId = null)
	{
		if($userId) {
			$sql = "SELECT * FROM chit WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM chit ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function getChitPaymentData($userId = null)
    {
        if($userId) {
            $sql = "SELECT * FROM payment WHERE id = ? AND chit>0";
            $query = $this->db->query($sql, array($userId));
            return $query->row_array();
        }

        $sql = "SELECT * FROM payment WHERE chit>0 ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


	public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('chit', $data);

			$user_id = $this->db->insert_id();

			return ($create == true) ? true : false;
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('chit', $data);

		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('chit');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
}
