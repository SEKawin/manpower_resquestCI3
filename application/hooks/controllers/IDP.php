<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Idp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') !== true) {
            redirect('login');
        }

        $this->load->model('idp_model', 'idp_form');
        $this->load->model('account_model', 'account');
    }

    // Admin
    public function index()
    {
        $this->load->view('IDP/IDP_form');
    }

    public function IDP_form()
    {
        $this->load->view('IDP/IDP_form');
    }
    public function IDP_list()
    {
        $account_id = $this->session->userdata('account_id');
        $dept_code = $this->session->userdata('department_code');
        $office_code = $this->session->userdata('office_code');
        $role = $this->session->userdata('role');
        $name_role = $this->session->userdata('name_role');
        $data['list_office'] = $this->account->list_office();
        $data['list_department'] = $this->account->list_department();
        $data['idp_list'] = $this->idp_form->get_idp_by_dept($account_id, $dept_code, $office_code, $name_role);
        $this->load->view('IDP/IDP_list', $data);
    }

    public function ajax_save_idp($code)
    {
        echo $code ;
        die;
        $emp_list = $this->idp_form->get_account_id($code);

        foreach ($emp_list as $row):
            $account_id = $row->account_id;

            if (!empty($_FILES['idp_file']['name'])) {
                $upload = $this->_do_upload();
                $data['idp_file'] = $upload;
            }

            $this->idp_form->save_file_idp($data, $account_id);
            echo json_encode(array("status" => true));
        endforeach;

    }

    private function _do_upload()
    {
        $config['upload_path'] = 'uploads/idp_emp';
        $config['allowed_types'] = 'gif|jpg|png|pdf|PDF';
        $config['max_size'] = 4096; //set max size allowed in Kilobyte
        // $config['max_width'] = 1000; // set max width image allowed
        // $config['max_height'] = 1000; // set max height allowed
        $config['file_name'] = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('idp_file')) //upload and validate
        {
            $data['inputerror'][] = 'idp_file';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = false;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    
            
}