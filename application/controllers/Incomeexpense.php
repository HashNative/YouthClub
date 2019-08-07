<?php

class Incomeexpense extends Admin_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_incomeexpense');
        $this->load->model('model_members');

    }

    public function index(){


        $incomeexpense_data = $this->model_incomeexpense->getIncomeExpenseData();

        $result = array();
        foreach ($incomeexpense_data as $k => $v) {

            $result[$k]['incomeexpense_info'] = $v;

        }

        $this->data['incomeexpense_data'] = $result;

        $this->render_template('modules/incomeexpense/incomeexpense', $this->data);


    }


    public function create()
    {

        $this->form_validation->set_rules('type', 'Membership No', 'required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');



        if ($this->form_validation->run() == TRUE) {
            // true case
            $data = array(
                'type' => $this->input->post('type'),
                'date' => $this->input->post('date'),
                'description' => $this->input->post('description'),
                'amount' => $this->input->post('amount'),


            );

            $create = $this->model_incomeexpense->create($data);
            if($create == true) {
                $this->session->set_flashdata('success', 'Successfully Recorded');
                redirect('incomeexpense/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('incomeexpense/create', 'refresh');
            }
        }
        else {
            $this->data['members_data'] = $this->model_members->getMemberData();

            $this->render_template('modules/incomeexpense/create', $this->data);
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


                $delete = $this->model_incomeexpense->delete($id);
                if($delete == true) {
                    $this->session->set_flashdata('success', 'Successfully removed');
                    redirect('incomeexpense/', 'refresh');
                }
                else {
                    $this->session->set_flashdata('error', 'Error occurred!!');
                    redirect('incomeexpense/delete/'.$id, 'refresh');
                }

            }
            else {
                $this->data['id'] = $id;
                $this->render_template('modules/incomeexpense/delete', $this->data);
            }
        }
    }


}
