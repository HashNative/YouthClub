<?php


class Login extends Admin_Controller{

    public function index(){
        $this->load->view('sections/header');
        $this->load->view('login');
        $this->load->view('sections/footer');

    }


}
