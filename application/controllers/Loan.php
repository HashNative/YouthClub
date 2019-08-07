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


        if($id) {

//            $this->form_validation->set_rules('membership_no', 'Membership No', 'required|is_unique[members.membership_no]');
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('NIC', 'NIC', 'trim|required');
            $this->form_validation->set_rules('nominee_full_name', 'Nominee- Full Name', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                // true case
                $data = array(
                    'full_name' => $this->input->post('full_name'),
                    'membership_no' => $this->input->post('membership_no'),
                    'address' => $this->input->post('address'),
                    'NIC' => $this->input->post('NIC'),
                    'contact_home' => $this->input->post('contact_home'),
                    'contact_mobile' => $this->input->post('contact_mobile'),
                    'dob' => $this->input->post('dob'),
                    'email' => $this->input->post('email'),
                    'bank' => $this->input->post('bank'),
                    'account_no' => $this->input->post('membership_no'),
                    'nominee_full_name' => $this->input->post('nominee_full_name'),
                    'nominee_relationship' => $this->input->post('nominee_relationship'),
                    'nominee_address' => $this->input->post('nominee_address'),
                    );

                $update = $this->model_members->edit($data,$id);
                if($update == true) {
                    $this->session->set_flashdata('success', 'Successfully updated');
                    redirect('members/', 'refresh');
                }
                else {
                    $this->session->set_flashdata('errors', 'Error occurred!!');
                    redirect('members/edit/'.$id, 'refresh');
                }
            }
            else {
                // false case
                $member_data = $this->model_members->getMemberData($id);
                $this->data['members_data'] = $member_data;


                $this->render_template('modules/members/edit', $this->data);
            }
        }
    }

    public function delete($id)
    {


        if($id) {
            if($this->input->post('confirm')) {


                $delete = $this->model_loan->delete($id);
                if($delete == true) {
                    $this->session->set_flashdata('success', 'Successfully removed');
                    redirect('loan/', 'refresh');
                }
                else {
                    $this->session->set_flashdata('error', 'Error occurred!!');
                    redirect('loan/delete/'.$id, 'refresh');
                }

            }
            else {
                $this->data['id'] = $id;
                $this->render_template('modules/loan/delete', $this->data);
            }
        }
    }


}
