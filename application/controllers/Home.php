<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') !== true) {
            redirect('login');
        }
    }

    public function index(){
        $this->load->view('home/home_v');
    }
}
