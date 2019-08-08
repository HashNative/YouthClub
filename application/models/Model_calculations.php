<?php

class Model_calculations extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function calculateDue($userId = null, $type)
    {
        if($userId) {
            //Get Opening
            $sql = "SELECT $type AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];


            //Get Sub Paid
            $sql1 = "SELECT SUM($type) AS subpaid FROM payment WHERE membership_no = ?";
            $result = $this->db->query($sql1, array($userId));

//            Here should check whether this month paid

            $fixed_amount=0;
            switch ($type){
                case 'subscription': $fixed_amount =600;
                    break;
                case 'umra':$fixed_amount =1000;
                    break;
                case 'chit': $fixed_amount =1500;
                    break;
                default: $fixed_amount=0;

            }
           $totalsubdue= ($opening+$fixed_amount) - $result->row()->subpaid;

            return $totalsubdue;

        }

    }

    public function calculateDueLoan($userId = null, $type)
    {
        if($userId) {
            //Get Opening
            $sql = "SELECT $type AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];

            //Get Sub Payment due

            if($type=='present1') {
                $sql1 = "SELECT SUM(present) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ?";
                $result1 = $this->db->query($sql1, array($userId, 'loan1'));
            }else if($type=='present2'){
                $sql1 = "SELECT SUM(present) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ?";
                $result1 = $this->db->query($sql1, array($userId, 'loan2'));
            }else{
                $sql1 = "SELECT SUM(amount) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ?";
                $result1 = $this->db->query($sql1, array($userId, $type));
            }
            //Get Sub Paid
            $sql2 = "SELECT SUM($type) AS subpaid FROM payment WHERE membership_no = ?";
            $result2 = $this->db->query($sql2, array($userId));


            $totalsubdue= ($opening+$result1->row()->subloan) - $result2->row()->subpaid;

            return $totalsubdue;

        }

    }

    public function calculateFineDue($userId = null){

        if($userId) {
            //Get Opening
            $sql = "SELECT fine AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];


            //Get Sub Paid
            $sql1 = "SELECT SUM(fine) AS subpaid FROM payment WHERE membership_no = ?";
            $result1 = $this->db->query($sql1, array($userId));


            //Get Sub Applied Fine
            $sql2 = "SELECT SUM(amount) AS appfine FROM incomeexpense WHERE SUBSTRING_INDEX(description, '-', 1) = ? AND type=?";
            $result2 = $this->db->query($sql2, array($userId,'Fine'));



//            Here should check whether this month paid


            $totalsubdue= ($opening+$result2->row()->appfine) - $result1->row()->subpaid;

            return $totalsubdue;

        }



    }





}