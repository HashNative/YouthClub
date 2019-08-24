<?php

class Dashboard extends Admin_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index($month = null, $year = null){

        if($month == null && $year == null) {
            $month = date('m');
            $year = date('Y');
        }
        $this->data['month'] = $month;
        $this->data['year'] = $year;
        // Credits
        $subscription_pay = $this->model_calculations->calculateTotalPayment('subscription',$month,$year);
        $fine_pay = $this->model_calculations->calculateTotalPayment('fine',$month,$year);
        $chit_pay = $this->model_calculations->calculateTotalPayment('chit',$month,$year);
        $umra_pay = $this->model_calculations->calculateTotalPayment('umra',$month,$year);
        $loan1_pay = $this->model_calculations->calculateTotalPayment('loan1',$month,$year);
        $present1_pay = $this->model_calculations->calculateTotalPayment('present1',$month,$year);
        $loan2_pay = $this->model_calculations->calculateTotalPayment('loan2',$month,$year);
        $present2_pay = $this->model_calculations->calculateTotalPayment('present2',$month,$year);
        $loandonation_pay = $this->model_calculations->calculateTotalPayment('loandonation',$month,$year);
        $brought_forward = $this->model_calculations->calculateBroughtForward($month,$year);


        $this->data['subscription_pay'] =$subscription_pay;
        $this->data['fine_pay'] =$fine_pay;
        $this->data['chit_pay'] =$chit_pay;
        $this->data['umra_pay'] =$umra_pay;
        $this->data['loan1_pay'] =$loan1_pay;
        $this->data['present1_pay'] =$present1_pay;
        $this->data['loan2_pay'] =$loan2_pay;
        $this->data['present2_pay'] =$present2_pay;
        $this->data['loandonation_pay'] =$loandonation_pay;
        $this->data['brought_forward'] =$brought_forward;

                // Income
        $income_data = $this->model_calculations->calculateIncomeExpense('income',$month,$year);

        $incomeresult = array();
        foreach ($income_data as $k => $v) {
            $incomeresult[$k]['income_info'] = $v;
        }
        $this->data['income_data'] = $incomeresult;

        // Debit



        $chit_given = $this->model_calculations->calculateTotalLoan('chit',$month,$year);
        $umra_given = $this->model_calculations->calculateTotalLoan('umra',$month,$year);
        $loan1_given = $this->model_calculations->calculateTotalLoan('loan1',$month,$year);
        $loan2_given = $this->model_calculations->calculateTotalLoan('loan2',$month,$year);
        $loandonation_given = $this->model_calculations->calculateTotalLoan('loandonation',$month,$year);


        $this->data['chit_given'] =$chit_given;
        $this->data['umra_given'] =$umra_given;
        $this->data['loan1_given'] =$loan1_given;
        $this->data['loan2_given'] =$loan2_given;
        $this->data['loandonation_given'] =$loandonation_given;





            // Expense
        $expense_data = $this->model_calculations->calculateIncomeExpense('expense',$month,$year);
        $expenseresult = array();
        foreach ($expense_data as $k => $v) {
            $expenseresult[$k]['expense_info'] = $v;
        }
        $this->data['expense_data'] = $expenseresult;






        $this->render_template('index', $this->data);


    }



}
