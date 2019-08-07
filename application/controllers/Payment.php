<?php

class Payment extends Admin_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_payment');
        $this->load->model('model_members');

    }

    public function index(){


        $payment_data = $this->model_payment->getPaymentData();

        $result = array();
        foreach ($payment_data as $k => $v) {

            $result[$k]['payment_info'] = $v;

        }

        $this->data['payment_data'] = $result;

        $this->render_template('modules/payment/payment', $this->data);


    }


    public function create()
    {

        $this->form_validation->set_rules('membership_no', 'Membership No', 'required');
//        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
//        $this->form_validation->set_rules('subscription', 'subscription', 'trim|required');
//        $this->form_validation->set_rules('fine', 'Fine', 'trim|required');
//        $this->form_validation->set_rules('umra', 'Umra', 'trim|required');
//        $this->form_validation->set_rules('chit', 'Chit', 'trim|required');
//        $this->form_validation->set_rules('locan1', 'Loan 1', 'trim|required');
//        $this->form_validation->set_rules('present1', 'Present 1', 'trim|required');
//        $this->form_validation->set_rules('loan2', 'Loan 2', 'trim|required');
//        $this->form_validation->set_rules('present2', 'Present 2', 'trim|required');
//        $this->form_validation->set_rules('loandonation', 'Loan Doantion', 'trim|required');
//        $this->form_validation->set_rules('extra', 'Extra', 'trim|required');





        if ($this->form_validation->run() == TRUE) {
            // true case
            $data = array(
               'full_name' => explode("-",$this->input->post('membership_no'))[1],
                'membership_no' => explode("-",$this->input->post('membership_no'))[0],
                'date' => $this->input->post('date'),
                'subscription' => $this->input->post('subscription'),
                'fine' => $this->input->post('fine'),
                'umra' => $this->input->post('umra'),
                'chit' => $this->input->post('chit'),
                'loan1' => $this->input->post('loan1'),
                'present1' => $this->input->post('present1'),
                'loan2' => $this->input->post('loan2'),
                'present2' => $this->input->post('present2'),
                'loandonation' => $this->input->post('loandonation'),
                'extra' => $this->input->post('extra'),
                'method' => $this->input->post('method'),
                'cheque_no' => $this->input->post('cheque_no'),



            );

            $create = $this->model_payment->create($data);
            if($create == true) {
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('payment/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('payment/create', 'refresh');
            }
        }
        else {
            $this->data['members_data'] = $this->model_members->getMemberData();

            $this->render_template('modules/payment/create', $this->data);
        }


    }

    public function edit($id = null)
    {


        if($id) {

//            $this->form_validation->set_rules('membership_no', 'Membership No', 'required|is_unique[members.membership_no]');
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('date', 'date', 'trim|required');
            $this->form_validation->set_rules('chit_no', 'Chit Number', 'trim|required');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                // true case
                $data = array(
                    'full_name' => $this->input->post('full_name'),
                    'membership_no' => $this->input->post('membership_no'),
                    'date' => $this->input->post('date'),
                    'chit_no' => $this->input->post('chit_no'),
                    'amount' => $this->input->post('amount'),

                    );

                $update = $this->model_chit->edit($data,$id);
                if($update == true) {
                    $this->session->set_flashdata('success', 'Successfully updated');
                    redirect('chit/', 'refresh');
                }
                else {
                    $this->session->set_flashdata('errors', 'Error occurred!!');
                    redirect('chit/edit/'.$id, 'refresh');
                }
            }
            else {
                // false case
                $chit_data = $this->model_chit->getChitData($id);
                $this->data['chit_data'] = $chit_data;


                $this->render_template('modules/chit/edit', $this->data);
            }
        }
    }

    public function delete($id)
    {


        if($id) {
            if($this->input->post('confirm')) {


                $delete = $this->model_payment->delete($id);
                if($delete == true) {
                    $this->session->set_flashdata('success', 'Successfully removed');
                    redirect('payment/', 'refresh');
                }
                else {
                    $this->session->set_flashdata('error', 'Error occurred!!');
                    redirect('payment/delete/'.$id, 'refresh');
                }

            }
            else {
                $this->data['id'] = $id;
                $this->render_template('modules/payment/delete', $this->data);
            }
        }
    }


}
