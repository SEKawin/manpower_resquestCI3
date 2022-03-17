<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Budget extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') !== true) {
            redirect('login');
        }

    }

    // Admin
    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('Budget_v');
        $this->load->view('layouts/footer');
    }

}
