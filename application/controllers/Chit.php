<?php

class Chit extends Admin_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_chit');
        $this->load->model('model_members');

    }

    public function index(){


        $chit_data = $this->model_chit->getChitData();

        $result = array();
        foreach ($chit_data as $k => $v) {
            $result[$k]['chit_info'] = $v;
        }
        $this->data['chit_data'] = $result;

        $chit_payment_data = $this->model_chit->getChitPaymentData();

        $result1 = array();
        foreach ($chit_payment_data as $k => $v) {
            $result1[$k]['chit_payment_info'] = $v;
        }
        $this->data['chit_payment_data'] = $result1;

        $this->render_template('modules/chit/chit', $this->data);


    }


    public function create()
    {

        $this->form_validation->set_rules('membership_no', 'Membership No', 'required');
//        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('chit_no', 'Chit Number', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');



        if ($this->form_validation->run() == TRUE) {
            // true case
            $data = array(
                'full_name' => explode("-",$this->input->post('membership_no'))[1],
                'membership_no' => explode("-",$this->input->post('membership_no'))[0],
                'date' => $this->input->post('date'),
                'chit_no' => $this->input->post('chit_no'),
                'amount' => $this->input->post('amount'),


            );

            $create = $this->model_chit->create($data);
            if($create == true) {
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('chit/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('chit/create', 'refresh');
            }
        }
        else {
            $this->data['members_data'] = $this->model_members->getMemberData();

            $this->render_template('modules/chit/create', $this->data);
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


                $delete = $this->model_chit->delete($id);
                if($delete == true) {
                    $this->session->set_flashdata('success', 'Successfully removed');
                    redirect('chit/', 'refresh');
                }
                else {
                    $this->session->set_flashdata('error', 'Error occurred!!');
                    redirect('chit/delete/'.$id, 'refresh');
                }

            }
            else {
                $this->data['id'] = $id;
                $this->render_template('modules/chit/delete', $this->data);
            }
        }
    }


}
