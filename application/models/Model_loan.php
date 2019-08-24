<?php 

class Model_loan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getLoanData($userId = null)
	{
		if($userId) {
			$sql = "SELECT * FROM loan WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM loan ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function getDividedData($userId = null)
    {
        if($userId) {
            $sql = "SELECT * FROM dividedloan WHERE id = ?";
            $query = $this->db->query($sql, array($userId));
            return $query->row_array();
        }

        $sql = "SELECT * FROM dividedloan ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


	public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('loan', $data);
			$loan_id = $this->db->insert_id();

            $duration = $this->input->post('duration');
            for($x = 0; $x <$duration; $x++) {
                $items = array(
                    'membership_no' => explode("-",$this->input->post('membership_no'))[0],
                    'type' => $this->input->post('loantype'),
                    'date_to_pay' => $this->input->post('datedivide')[$x],
                    'amount' => $this->input->post('amountdivide')[$x],
                    'present' => $this->input->post('presentdivide')[$x],
                    'loan_id' => $loan_id,
                );

                $this->db->insert('dividedloan', $items);
            }


			return ($create == true) ? true : false;
		}
	}



	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('loan', $data);

		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('loan');

        $this->db->where('loan_id', $id);
        $delete = $this->db->delete('dividedloan');

		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
}
