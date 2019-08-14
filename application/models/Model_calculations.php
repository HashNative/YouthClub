<?php

class Model_calculations extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    // Individual
    public function calculateDue($userId = null, $type)
    {

        if($userId) {

            //Get Opening
            $sql = "SELECT IFNULL($type,0) AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];


            //Get Sub Paid
            $sql1 = "SELECT IFNULL(SUM($type),0) AS subpaid FROM payment WHERE membership_no = ?";
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
           $totalsubdue= $opening+$fixed_amount - $result->row()->subpaid;

            return $totalsubdue;

        }

    }

    public function calculateDueLoan($userId = null, $type)
    {
        if($userId) {
            //Get Opening
            $sql = "SELECT IFNULL($type,0) AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];

            //Get Sub Payment due

            if($type=='present1') {
                $sql1 = "SELECT IFNULL(SUM(present),0) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ?";
                $result1 = $this->db->query($sql1, array($userId, 'loan1'));
            }else if($type=='present2'){
                $sql1 = "SELECT IFNULL(SUM(present),0) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ?";
                $result1 = $this->db->query($sql1, array($userId, 'loan2'));
            }else{
                $sql1 = "SELECT IFNULL(SUM(amount),0) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ? AND MONTH(date_to_pay)<=".date('m');
                $result1 = $this->db->query($sql1, array($userId, $type));
            }
            //Get Sub Paid
            $sql2 = "SELECT IFNULL(SUM($type),0) AS subpaid FROM payment WHERE membership_no = ?";
            $result2 = $this->db->query($sql2, array($userId));


           $totalsubdue= ($opening+$result1->row()->subloan) - $result2->row()->subpaid;


            return $totalsubdue;

        }

    }

    public function calculateFineDue($userId = null){

        if($userId) {
            //Get Opening
            $sql = "SELECT IFNULL(fine,0) AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];


            //Get Sub Paid
            $sql1 = "SELECT IFNULL(SUM(fine),0) AS subpaid FROM payment WHERE membership_no = ?";
            $result1 = $this->db->query($sql1, array($userId));


            //Get Sub Applied Fine
            $sql2 = "SELECT IFNULL(SUM(amount),0) AS appfine FROM incomeexpense WHERE SUBSTRING_INDEX(description, '-', 1) = ? AND type=?";
            $result2 = $this->db->query($sql2, array($userId,'Fine'));



//            Here should check whether this month paid


            $totalsubdue= ($opening+$result2->row()->appfine) - $result1->row()->subpaid;

            return $totalsubdue;

        }





    }

    public function getFine(){

        $value = 650;
        return $value;
    }


    // Monthly


    public function calculateTotalPayment($type, $month){
        $sql1 = "SELECT IFNULL(SUM($type),0) AS subpaid FROM payment WHERE MONTH(date)=?";
        $result = $this->db->query($sql1, array($month));

        return $result->row()->subpaid;
    }

    public function calculateTotalLoan($type, $month){
        if($type=='umra'){
            $sql1 = "SELECT IFNULL(SUM(amount),0) AS subumra FROM umra WHERE MONTH(date)=?";
            $result = $this->db->query($sql1, array($month));
            return $result->row()->subumra;
        }elseif ($type=='chit'){
            $sql1 = "SELECT IFNULL(SUM(amount),0) AS subchit FROM chit WHERE MONTH(date)=?";
            $result = $this->db->query($sql1, array($month));
            return $result->row()->subchit;
        }
        $sql1 = "SELECT IFNULL(SUM(amount),0) AS subpaid FROM loan WHERE MONTH(date)=? AND type=?";
        $result = $this->db->query($sql1, array($month,$type));


        return $result->row()->subpaid;

    }

    public function calculateIncomeExpense($type, $month){

        $sql1 = "SELECT IFNULL(SUM(amount),0) AS subamount, description FROM incomeexpense WHERE MONTH(date)=? AND type=? GROUP BY description";
        $result = $this->db->query($sql1, array($month,$type));

        return $result->result_array();

    }


            // Brought forward
    public function calculateBroughtForward($month){
                    // ====Credit====
        // opening
        $sql_opening = "SELECT IFNULL(SUM(amount),0) AS subopening FROM incomeexpense WHERE type=?";
        $result_opening = $this->db->query($sql_opening, array('opening'));

        $opening = $result_opening->row()->subopening;

        // Income
        $sql_income = "SELECT IFNULL(SUM(amount),0) AS subincome FROM incomeexpense WHERE type=? AND MONTH(date)<?";
        $result_income = $this->db->query($sql_income, array('income', $month));

        $income = $result_income->row()->subincome;

        // Payment
        $sql_payment = "SELECT 
                        IFNULL(subscription,0)
                        + IFNULL(SUM(fine),0)
                        + IFNULL(SUM(umra),0)
                        + IFNULL(SUM(chit),0)
                        + IFNULL(SUM(loan1),0)
                        + IFNULL(SUM(present1),0)
                        + IFNULL(SUM(loan2),0)
                        + IFNULL(SUM(present2),0)
                        + IFNULL(SUM(loandonation),0)
                        + IFNULL(SUM(extra),0) 
                        AS subpayment FROM payment WHERE MONTH(date)<?";
        $result_payment = $this->db->query($sql_payment, array($month));

        $payment = $result_payment->row()->subpayment;


                            // ====Debit====
        // chit
        $sql_chit = "SELECT IFNULL(SUM(amount),0) AS subchit FROM chit WHERE MONTH(date)<?";
        $result_chit = $this->db->query($sql_chit, array($month));

        $chit = $result_chit->row()->subchit;

        // Expense
        $sql_expense = "SELECT IFNULL(SUM(amount),0) AS subexpense FROM incomeexpense WHERE type=? AND MONTH(date)<?";
        $result_expense = $this->db->query($sql_expense, array('expense', $month));

        $expense = $result_expense->row()->subexpense;

        // loan
        $sql_loan = "SELECT IFNULL(SUM(amount),0) AS subloan FROM chit WHERE MONTH(date)<?";
        $result_loan = $this->db->query($sql_loan, array($month));

        $loan = $result_loan->row()->subloan;

        // umra
        $sql_umra = "SELECT IFNULL(SUM(amount),0) AS subumra FROM umra WHERE MONTH(date)<?";
        $result_umra = $this->db->query($sql_umra, array($month));

        $umra = $result_umra->row()->subumra;

        $brought_forward = ($opening+$income+$payment)-($chit+$expense+$loan+$umra);

        return $brought_forward;
    }


}
