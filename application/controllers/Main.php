<?php

class Main extends Admin_Controller {

    public function index(){

        $this->load->view('sections/header');
        $this->load->view('sections/navbar');
        $this->load->view('sections/sidebar');

        $this->load->view('index');
        $this->load->view('sections/footer');

    }

    public function member(){


        $this->load->view('sections/header');
        $this->load->view('sections/navbar');
        $this->load->view('sections/sidebar');
        $this->load->view('index');
        $this->load->view('sections/footer');

    }




}