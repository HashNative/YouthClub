<?php

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
        redirect('reports/', 'refresh');

    }

    

}
