<?php

class Loan extends Admin_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_loan');
        $this->load->model('model_members');

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


        $loan_data = $this->model_loan->getLoanData();

        $result = array();
        foreach ($loan_data as $k => $v) {

            $result[$k]['loan_info'] = $v;

        }

            $this->data['loan_data'] = $result;

        $loan_divided_data = $this->model_loan->getDividedData();

        $result1 = array();
        foreach ($loan_divided_data as $k => $v) {

            $result1[$k]['loan_divided_info'] = $v;

        }

        $this->data['loan_divided_data'] = $result1;


        $this->render_template('modules/loan/loan', $this->data);


    }


    public function create()
    {

        $this->form_validation->set_rules('membership_no', 'Membership No', 'required');
        $this->form_validation->set_rules('loandate', 'Date', 'trim|required');
        $this->form_validation->set_rules('loantype', 'Type', 'trim|required');
        $this->form_validation->set_rules('loanamount', 'Amount', 'trim|required');
//        $this->form_validation->set_rules('presentamount', 'Present', 'trim|required');
        $this->form_validation->set_rules('duration', 'Duration', 'trim|required');
        $this->form_validation->set_rules('witness1', 'Witness 1', 'trim|required');
        $this->form_validation->set_rules('witness2', 'Witness 2', 'trim|required');





        if ($this->form_validation->run() == TRUE) {
            // true case
            $data = array(
                'full_name' => explode("-",$this->input->post('membership_no'))[1],
                'membership_no' => explode("-",$this->input->post('membership_no'))[0],
                'date' => $this->input->post('loandate'),
                'type' => $this->input->post('loantype'),
                'amount' => $this->input->post('loanamount'),
                'present' => $this->input->post('presentamount'),
                'duration' => $this->input->post('duration'),
                'method' => $this->input->post('method'),
                'cheque_no' => $this->input->post('cheque_no'),
                'witness1' => $this->input->post('witness1'),
                'witness2' => $this->input->post('witness2'),
            );

            $create = $this->model_loan->create($data);

            if($create == true) {
                $this->session->set_flashdata('success', 'Successfully created');
               redirect('loan/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('loan/create', 'refresh');
            }
        }
        else {



            $this->data['members_data'] = $this->model_members->getMemberData();

            $this->render_template('modules/loan/create', $this->data);
        }


    }

    public function edit($id = null)
    {

      
        $this->form_validation->set_rules('membership_no', 'Membership No', 'required');
        $this->form_validation->set_rules('loandate', 'Date', 'trim|required');
        $this->form_validation->set_rules('loantype', 'Type', 'trim|required');
        $this->form_validation->set_rules('loanamount', 'Amount', 'trim|required');
//        $this->form_validation->set_rules('presentamount', 'Present', 'trim|required');
        $this->form_validation->set_rules('duration', 'Duration', 'trim|required');
        $this->form_validation->set_rules('witness1', 'Witness 1', 'trim|required');
        $this->form_validation->set_rules('witness2', 'Witness 2', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            // true case
            $data = array(
                'full_name' => explode("-",$this->input->post('membership_no'))[1],
                'membership_no' => explode("-",$this->input->post('membership_no'))[0],
                'date' => $this->input->post('loandate'),
                'type' => $this->input->post('loantype'),
                'amount' => $this->input->post('loanamount'),
                'present' => $this->input->post('presentamount'),
                'duration' => $this->input->post('duration'),
                'method' => $this->input->post('method'),
                'cheque_no' => $this->input->post('cheque_no'),
                'witness1' => $this->input->post('witness1'),
                'witness2' => $this->input->post('witness2'),
            );

            $create = $this->model_loan->edit($data,$id);

            if($create == true) {
                $this->session->set_flashdata('success', 'Successfully updated');
               redirect('loan/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('loan/edit', 'refresh');
            }
        }
        else {


            $this->data['loan_data'] = $this->model_loan->getLoanData($id);
            $this->data['members_data'] = $this->model_members->getMemberData();

            $this->render_template('modules/loan/edit', $this->data);
        }

    }







}
