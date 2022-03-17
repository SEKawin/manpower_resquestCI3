<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_manp extends CI_Controller
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
    $this->load->model('managa_m', 'managa_m');
  }

  public function index()
  {
    $data['cost_centers'] = $this->account_m->list_department();
    $data['section'] = $this->account_m->list_section();

    $this->load->view('manage_manp/manage_manp_v', $data);
  }

  public function ajax_add_bizplan()
  {

    $account_code = $this->session->userdata('code');

    $data = array(
      'year' => $this->input->post('year'),
      'cost_cen' => $this->input->post('cost_cen'),
      'cost_cen_posi' => $this->input->post('cost_cen_posi'),
      // 'position_title' => $this->input->post('position_title'),
      'level' => $this->input->post('level'),
      'name_of_posi' => $this->input->post('name_of_posi'),
      'required_amount' => $this->input->post('required_amount'),
      // 'remaining_amount' => $this->input->post('required_amount'),
      'create_by' => $account_code

    );

    $this->managa_m->add_bizplan($data);
    echo json_encode(array("status" => true));
  }

  public function ajax_edit_bizplan($biz_id)
  {
    $data = $this->managa_m->view_bizplan_by_id($biz_id);
    echo json_encode($data);
  }

  public function ajax_update_bizplan()
  {
    $account_code = $this->session->userdata('code');

    $data = array(
      'year' => $this->input->post('year'),
      'cost_cen' => $this->input->post('cost_cen'),
      'cost_cen_posi' => $this->input->post('cost_cen_posi'),
      'level' => $this->input->post('level'),
      'name_of_posi' => $this->input->post('name_of_posi'),
      'required_amount' => $this->input->post('required_amount'),
      // 'remaining_amount' => $this->input->post('required_amount'),
      'create_by' => $account_code
    );

    $this->managa_m->update_bizplan(array('biz_id' => $this->input->post('biz_id')), $data);
    echo json_encode(array("status" => true));
  }

  public function ajax_remove_bizplan($biz_id)
  {
    $this->managa_m->remove_bizplan($biz_id);
    echo json_encode(array("status" => true));
  }

  public function ajax_add_replace()
  {

    $account_code = $this->session->userdata('code');

    $data = array(
      'year' => $this->input->post('year'),
      'cost_cen' => $this->input->post('cost_cen'),
      'cost_cen_posi' => $this->input->post('cost_cen_posi'),
      'position_replace' => $this->input->post('position_replace'),
      'name_replace' => $this->input->post('name_replace'),
      'required_amount' => $this->input->post('required_amount'),
      // 'remaining_amount' => $this->input->post('required_amount'),
      'create_by' => $account_code
    );

    if (!empty($_FILES['resignation_attach']['name'])) :
      $upload = $this->_do_upload();
      $data['resignation_attach'] = $upload;
    endif;

    $this->managa_m->add_replace($data);

    echo json_encode(array("status" => true));
  }

  private function _do_upload()
  {
    $config['upload_path'] = 'uploads/resignation_attach';
    $config['allowed_types'] = 'pdf|PDF';
    $config['max_size'] = 2024; //set max size allowed in Kilobyte
    // $config['max_width'] = 1000; // set max width image allowed
    // $config['max_height'] = 1000; // set max height allowed
    $config['file_name'] = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('resignation_attach')) //upload and validate
    {
      $data['inputerror'][] = 'resignation_attach';
      $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
      $data['status'] = false;
      echo json_encode($data);
      exit();
    }
    return $this->upload->data('file_name');
  }

  public function ajax_edit_replace($repl_id)
  {
    $data = $this->managa_m->view_replace_by_id($repl_id);
    echo json_encode($data);
  }

  public function ajax_update_replace()
  {
    $account_code = $this->session->userdata('code');

    $data = array(
      'year' => $this->input->post('year'),
      'cost_cen' => $this->input->post('cost_cen'),
      'cost_cen_posi' => $this->input->post('cost_cen_posi'),
      'position_replace' => $this->input->post('position_replace'),
      'name_replace' => $this->input->post('name_replace'),
      'required_amount' => $this->input->post('required_amount'),
      // 'remaining_amount' => $this->input->post('required_amount'),
      'create_by' => $account_code
    );

    if (!empty($_FILES['resignation_attach']['name'])) :
      $upload = $this->_do_upload();
      $data['resignation_attach'] = $upload;
    endif;

    $this->managa_m->update_replace(array('repl_id' => $this->input->post('repl_id')), $data);

    echo json_encode(array("status" => true));
  }

  public function ajax_remove_replace($repl_id)
  {
    $this->managa_m->remove_replace($repl_id);
    echo json_encode(array("status" => true));
  }
}
