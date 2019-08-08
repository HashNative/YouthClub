<?php

class Individualaccount extends Admin_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_members');
        $this->load->model('model_calculations');

    }
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

    public function index(){


        $member_data = $this->model_members->getMemberData();

        $result = array();
        foreach ($member_data as $k => $v) {

            $result[$k]['members_info'] = $v;

        }

        $this->data['members_data'] = $result;

        $this->render_template('modules/individualaccount/individual_account', $this->data);


    }


    public function due($membership_no,$id){

        $member_data = $this->model_members->getMemberData($id);
        $subscription_due = $this->model_calculations->calculateDue($membership_no,'subscription');
        $chit_due = $this->model_calculations->calculateDue($membership_no,'chit');


        $umra_due = $this->model_calculations->calculateDue($membership_no,'umra');
        $fine_due = $this->model_calculations->calculateFineDue($membership_no);
        $loan1_due = $this->model_calculations->calculateDueLoan($membership_no,'loan1');
        $present1_due = $this->model_calculations->calculateDueLoan($membership_no,'present1');
        $loan2_due = $this->model_calculations->calculateDueLoan($membership_no,'loan2');
        $present2_due = $this->model_calculations->calculateDueLoan($membership_no,'present2');
        $loandonation_due = $this->model_calculations->calculateDueLoan($membership_no,'loandonation');



        $this->data['members_data'] = $member_data;
        $this->data['subscription_due'] =$subscription_due;
        $this->data['chit_due'] =$chit_due;


        $this->data['umra_due'] =$umra_due;
        $this->data['fine_due'] =$fine_due;
        $this->data['loan1_due'] =$loan1_due;
        $this->data['present1_due'] =$present1_due;
        $this->data['loan2_due'] =$loan2_due;
        $this->data['present2_due'] =$present2_due;
        $this->data['loandonation_due'] =$loandonation_due;




        $this->render_template('modules/individualaccount/individual_account', $this->data);

    }


}
