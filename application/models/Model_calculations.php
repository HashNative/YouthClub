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

        if ($userId) {


            //Get Opening
            $sql = "SELECT IFNULL($type,0) AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];


            //Get Sub Paid
            $sql1 = "SELECT IFNULL(SUM($type),0) AS subpaid FROM payment WHERE membership_no = ?";
            $result = $this->db->query($sql1, array($userId));

            //Get Opening Date
            $sql2 = "SELECT date FROM incomeexpense WHERE type = ?";
            $result1 = $this->db->query($sql2, array('opening'));
            $opening_date = $result1->row_array()['date'];

            $fixed_amount = 0;
            switch ($type) {
                case 'subscription':
                    $fixed_amount = 600;
                    break;
                case 'umra':
                    $fixed_amount = 1000;
                    break;
                case 'chit':
                    $fixed_amount = 2000;
                    break;
                default:
                    $fixed_amount = 0;

            }

            $date1 = new DateTime($opening_date);
            $date2 = $date1->diff(new DateTime(date('Y-m-d')));
            //this month calculation ends up with 28th. but the month calculation will return by deducting one month.
            // So, we have to add fixed amount for one more month.
            $totalsubdue = $opening + ($date2->m+1)*$fixed_amount - $result->row()->subpaid;
            //chit amount increased by 500 rs from 6th month. so we need to reduce 500*5 when calculate 
            if ($type=='chit') {
                $totalsubdue=$totalsubdue-500*5;
            } 

            if ($totalsubdue<0) {
                $totalsubdue=0;
            }
            return $totalsubdue;

        }

    }


    public function calculateDueLoan($userId = null, $type)
    {
        if ($userId) {
            //Get Opening
            $sql = "SELECT IFNULL($type,0) AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];

            //Get Sub Payment due

            if ($type == 'present1') {
                $sql1 = "SELECT IFNULL(SUM(present),0) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ? AND MONTH(date_to_pay)<=" . date('m')." AND YEAR(date_to_pay)<=" . date('Y') ;
                $result1 = $this->db->query($sql1, array($userId, 'loan1'));
            } else if ($type == 'present2') {
                $sql1 = "SELECT IFNULL(SUM(present),0) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ? AND MONTH(date_to_pay)<=" . date('m')." AND YEAR(date_to_pay)<=" . date('Y') ;
                $result1 = $this->db->query($sql1, array($userId, 'loan2'));
            }else {
                $sql1 = "SELECT IFNULL(SUM(amount),0) AS subloan FROM dividedloan WHERE membership_no = ? AND type = ? AND MONTH(date_to_pay)<=" . date('m')." AND YEAR(date_to_pay)<=" . date('Y') ;
                $result1 = $this->db->query($sql1, array($userId, $type));
            }
            //Get Sub Paid
            $sql2 = "SELECT IFNULL(SUM($type),0) AS subpaid FROM payment WHERE membership_no = ?";
            $result2 = $this->db->query($sql2, array($userId));


            $totalsubdue = ($opening + $result1->row()->subloan) - $result2->row()->subpaid;

            if ($totalsubdue<0) {
                $totalsubdue=0;
            }
            return $totalsubdue;
       

        }

    }

    public function calculateFineDue($userId = null)
    {

        if ($userId) {
            //Get Opening
            $sql = "SELECT IFNULL(fine,0) AS subopening FROM members WHERE membership_no = ?";
            $query = $this->db->query($sql, array($userId));
            $opening = $query->row_array()['subopening'];


            //Get Sub Paid
            $sql1 = "SELECT IFNULL(SUM(fine),0) AS subpaid FROM payment WHERE membership_no = ?";
            $result1 = $this->db->query($sql1, array($userId));


            //Get Sub Applied Fine
            $sql2 = "SELECT IFNULL(SUM(amount),0) AS appfine FROM incomeexpense WHERE SUBSTRING_INDEX(description, '-', 1) = ? AND type=?";
            $result2 = $this->db->query($sql2, array($userId, 'Fine'));


//            Here should check whether this month paid


            $totalsubdue = ($opening + $result2->row()->appfine) - $result1->row()->subpaid;

            return $totalsubdue;

        }


    }

    public function getFine()
    {

        $value = 650;
        return $value;
    }


    // Monthly


    public function calculateTotalPayment($type, $month=null, $year)
    {
               
        if ($month) {
            $sql1 = "SELECT IFNULL(SUM($type),0) AS subpaid FROM payment WHERE MONTH(date)=? AND YEAR(date)=?";
            $result = $this->db->query($sql1, array($month,$year));
            return $result->row()->subpaid;
               
              
            }

            $sql1 = "SELECT IFNULL(SUM($type),0) AS subpaid FROM payment WHERE YEAR(date)=?";
            $result = $this->db->query($sql1, array($year));
    
            return $result->row()->subpaid; 

       
    }

    public function calculateTotalLoan($type,$month=null, $year)
    {
       if ( $month) {
        if ($type == 'umra') {
            $sql1 = "SELECT IFNULL(SUM(amount),0) AS subumra FROM umra WHERE MONTH(date)=? AND YEAR(date)=?";
            $result = $this->db->query($sql1, array($month, $year));
            return $result->row()->subumra;
        } elseif ($type == 'chit') {
            $sql1 = "SELECT IFNULL(SUM(amount),0) AS subchit FROM chit WHERE MONTH(date)=? AND YEAR(date)=?";
            $result = $this->db->query($sql1, array($month, $year));
            return $result->row()->subchit;
        }
        $sql1 = "SELECT IFNULL(SUM(amount),0) AS subpaid FROM loan WHERE MONTH(date)=? AND type=? AND YEAR(date)=?";
        $result = $this->db->query($sql1, array($month, $type, $year));


        return $result->row()->subpaid;
       }
       
       if ($type == 'umra') {
        $sql1 = "SELECT IFNULL(SUM(amount),0) AS subumra FROM umra WHERE YEAR(date)=?";
        $result = $this->db->query($sql1, array($year));
        return $result->row()->subumra;
    } elseif ($type == 'chit') {
        $sql1 = "SELECT IFNULL(SUM(amount),0) AS subchit FROM chit WHERE YEAR(date)=?";
        $result = $this->db->query($sql1, array($year));
        return $result->row()->subchit;
    }
    $sql1 = "SELECT IFNULL(SUM(amount),0) AS subpaid FROM loan WHERE type=? AND YEAR(date)=?";
    $result = $this->db->query($sql1, array($type, $year));


    return $result->row()->subpaid;
    

    }

    public function calculateIncomeExpense($type, $month=null, $year)
    {

        if ($month) {
            $sql1 = "SELECT IFNULL(SUM(amount),0) AS subamount, description FROM incomeexpense WHERE MONTH(date)=? AND type=? AND YEAR(date)=? GROUP BY description";
            $result = $this->db->query($sql1, array($month, $type, $year));
    
            return $result->result_array();
        }
        $sql1 = "SELECT IFNULL(SUM(amount),0) AS subamount, description FROM incomeexpense WHERE type=? AND YEAR(date)=? GROUP BY description";
        $result = $this->db->query($sql1, array($type, $year));

        return $result->result_array();

    }

    public function calculateBroughtForward($month=null, $year)
    {
        if ($month) {
           // ====Credit====
        // opening
        $sql_opening = "SELECT IFNULL(SUM(amount),0) AS subopening FROM incomeexpense WHERE type=?";
        $result_opening = $this->db->query($sql_opening, array('opening'));

        $opening = $result_opening->row()->subopening;

        // Income
        $sql_income = "SELECT IFNULL(SUM(amount),0) AS subincome FROM incomeexpense WHERE type=? AND MONTH(date)<? AND YEAR(date)<=?";
        $result_income = $this->db->query($sql_income, array('income', $month, $year));

        $income = $result_income->row()->subincome;

        // Payment
        $sql_payment = "SELECT 
                        IFNULL(SUM(subscription),0)
                        + IFNULL(SUM(fine),0)
                        + IFNULL(SUM(umra),0)
                        + IFNULL(SUM(chit),0)
                        + IFNULL(SUM(loan1),0)
                        + IFNULL(SUM(present1),0)
                        + IFNULL(SUM(loan2),0)
                        + IFNULL(SUM(present2),0)
                        + IFNULL(SUM(loandonation),0)
                        + IFNULL(SUM(extra),0) 
                        AS subpayment FROM payment WHERE MONTH(date)<? AND YEAR(date)<=?";
        $result_payment = $this->db->query($sql_payment, array($month, $year));

        $payment = $result_payment->row()->subpayment;


        // ====Debit====
        // chit
        $sql_chit = "SELECT IFNULL(SUM(amount),0) AS subchit FROM chit WHERE MONTH(date)<? AND YEAR(date)<=?";
        $result_chit = $this->db->query($sql_chit, array($month, $year));

        $chit = $result_chit->row()->subchit;

        // Expense
        $sql_expense = "SELECT IFNULL(SUM(amount),0) AS subexpense FROM incomeexpense WHERE type=? AND MONTH(date)<? AND YEAR(date)<=?";
        $result_expense = $this->db->query($sql_expense, array('expense', $month, $year));

        $expense = $result_expense->row()->subexpense;

        // loan
        $sql_loan = "SELECT IFNULL(SUM(amount),0) AS subloan FROM loan WHERE MONTH(date)<? AND YEAR(date)<=?";
        $result_loan = $this->db->query($sql_loan, array($month, $year));

        $loan = $result_loan->row()->subloan;

        // umra
        $sql_umra = "SELECT IFNULL(SUM(amount),0) AS subumra FROM umra WHERE MONTH(date)<? AND YEAR(date)<=?";
        $result_umra = $this->db->query($sql_umra, array($month, $year));

        $umra = $result_umra->row()->subumra;

        $brought_forward = $opening + $income + $payment - ($chit + $expense + $loan + $umra);

        return $brought_forward;
        }

         // ====Credit====
        // opening
        $sql_opening = "SELECT IFNULL(SUM(amount),0) AS subopening FROM incomeexpense WHERE type=?";
        $result_opening = $this->db->query($sql_opening, array('opening'));

        $opening = $result_opening->row()->subopening;

        // Income
        $sql_income = "SELECT IFNULL(SUM(amount),0) AS subincome FROM incomeexpense WHERE type=? AND YEAR(date)<=?";
        $result_income = $this->db->query($sql_income, array('income', $year));

        $income = $result_income->row()->subincome;

        // Payment
        $sql_payment = "SELECT 
                        IFNULL(SUM(subscription),0)
                        + IFNULL(SUM(fine),0)
                        + IFNULL(SUM(umra),0)
                        + IFNULL(SUM(chit),0)
                        + IFNULL(SUM(loan1),0)
                        + IFNULL(SUM(present1),0)
                        + IFNULL(SUM(loan2),0)
                        + IFNULL(SUM(present2),0)
                        + IFNULL(SUM(loandonation),0)
                        + IFNULL(SUM(extra),0) 
                        AS subpayment FROM payment WHERE YEAR(date)<=?";
        $result_payment = $this->db->query($sql_payment, array($year));

        $payment = $result_payment->row()->subpayment;


        // ====Debit====
        // chit
        $sql_chit = "SELECT IFNULL(SUM(amount),0) AS subchit FROM chit WHERE YEAR(date)<=?";
        $result_chit = $this->db->query($sql_chit, array($year));

        $chit = $result_chit->row()->subchit;

        // Expense
        $sql_expense = "SELECT IFNULL(SUM(amount),0) AS subexpense FROM incomeexpense WHERE type=? AND YEAR(date)<=?";
        $result_expense = $this->db->query($sql_expense, array('expense', $year));

        $expense = $result_expense->row()->subexpense;

        // loan
        $sql_loan = "SELECT IFNULL(SUM(amount),0) AS subloan FROM loan WHERE YEAR(date)<=?";
        $result_loan = $this->db->query($sql_loan, array($year));

        $loan = $result_loan->row()->subloan;

        // umra
        $sql_umra = "SELECT IFNULL(SUM(amount),0) AS subumra FROM umra WHERE YEAR(date)<=?";
        $result_umra = $this->db->query($sql_umra, array($year));

        $umra = $result_umra->row()->subumra;

        $brought_forward = $opening + $income + $payment - ($chit + $expense + $loan + $umra);

        return $brought_forward;


    }


}
