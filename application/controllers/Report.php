<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  /**
   * Index Page for this controller.
   */
  function __construct()
  {
    parent::__construct();

    $this->load->model('account_model', 'account_m');
    $this->load->model('manpower_form_m', 'manpower_form_m');
    $this->load->model('approval_m', 'approval_m');
  }

  public function manpower_form($hr_no, $year)
  {
    $data['form'] = $this->manpower_form_m->get_view_manp_form($hr_no, $year);

    $this->load->view('report/manpower_form', $data);
  }
}
