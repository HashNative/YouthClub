<?php 

class Model_umra extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUmraData($userId = null)
	{
		if($userId) {
			$sql = "SELECT * FROM umra WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM umra ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function getUmraPaymentData($userId = null)
    {
        if($userId) {
            $sql = "SELECT * FROM payment WHERE id = ? AND umra>0";
            $query = $this->db->query($sql, array($userId));
            return $query->row_array();
        }

        $sql = "SELECT * FROM payment WHERE umra>0 ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getUmraAccount($userId = null)
    {
        if($userId) {
            $sql = "SELECT * FROM payment WHERE id = ?";
            $query = $this->db->query($sql, array($userId));
            return $query->row_array();
        }

        //Join function with members-umraopening, payment-umra, umra-amount

        $sql = "SELECT  m.membership_no AS membership_no, m.full_name AS full_name, IFNULL(m.umra_opening,0) AS umra_opening
      , (SELECT IFNULL(SUM(p.umra),0) FROM payment p WHERE p.membership_no = m.membership_no) as paidumra
      , (SELECT IFNULL(SUM(u.amount),0) FROM umra u WHERE u.membership_no = m.membership_no) as umraloan
        FROM members m ORDER BY m.membership_no ASC";


        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('umra', $data);

			$user_id = $this->db->insert_id();

			return ($create == true) ? true : false;
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('umra', $data);

		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('umra');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
	
}
