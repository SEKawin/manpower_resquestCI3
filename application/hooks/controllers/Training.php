<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Training extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== true) {
            redirect('login');
        }
        // Load Pagination library
        $this->load->library('pagination');
        // Load database
        $this->load->model('training_model', 'training');
        $this->load->model('account_model', 'account');
        $this->load->model('approval_model', 'approval');
        $this->load->model('idp_model', 'idp_form');

    }

    public function index()
    {
        $data['list_mgr'] = $this->account->get_appr_by_office();

        $account_id = $this->session->userdata('account_id');
        $data['get_acc'] = $this->training->get_role($account_id);
        
        $data['get_role_appr'] = $this->training->get_role_appr($account_id);

        $data['get_idp'] = $this->idp_form->get_idp_by_code($account_id);

        // พนักงาน
        $data['course_emp'] = $this->training->get_home_tra_by_emp($account_id);
        $data['course_mgr'] = $this->training->get_home_tra_by_mgr($account_id);
        $data['course_hrd'] = $this->training->get_home_tra_by_hrd($account_id);
        $data['course_hrd_mgr'] = $this->training->get_home_tra_by_hrd_mgr($account_id);
        $data['course_od'] = $this->training->get_home_tra_by_od($account_id);
        $data['course_evp'] = $this->training->get_home_tra_by_evp($account_id);
        // print_r($data);
        $this->load->view('training/training_form_v', $data);
    }
    public function ajx_search_employee()
    {
        $account = $this->account;
        $term = $this->input->get('term');

        foreach ($account as $emp) {
            $str = "{$emp->code} {$emp->firstname_th} {$emp->lastname_th}";
            array_push($arr, $str);
        }

        echo json_encode($arr);
    }
    public function ajax_add_training_form()
    {
        $this->_validate();
        $account_id = $this->session->userdata('account_id');

        // DATA PREPARATION
        $data = array(
            'course_name' => $this->input->post('course_name'),
            'place_of_course' => $this->input->post('place_of_course'),
            'date' => $this->input->post('date'),
            'consistent_course' => $this->input->post('consistent_course'),
            'work_eff' => $this->input->post('work_eff'),
            'reduce_cost' => $this->input->post('reduce_cost'),
            'reduc_error' => $this->input->post('reduc_error'),
            'other' => $this->input->post('other'),
            'other_details' => $this->input->post('other_details'),
            'details_exp' => $this->input->post('details_exp'),
        );

        $work_eff = $data['work_eff'];
        $reduce_cost = $data['reduce_cost'];
        $reduc_error = $data['reduc_error'];
        $other = $data['other'];
        $other_details = $data['other_details'];

        if (!empty($work_eff)) {
            $data['work_eff'] = $work_eff;
        } else {
            $data['work_eff'] = 0;
        }

        if (!empty($reduce_cost)) {
            $data['reduce_cost'] = $reduce_cost;
        } else {
            $data['reduce_cost'] = 0;
        }

        if (!empty($reduc_error)) {
            $data['reduc_error'] = $reduc_error;
        } else {
            $data['reduc_error'] = 0;
        }

        if (!empty($other)) {
            $data['other'] = $other;
        } else {
            $data['other'] = 0;
        }

        if (!empty($other_details)) {
            $data['other_details'] = $other_details;
        } else {
            $data['other_details'] = 0;
        }

        if (!empty($_FILES['course_file']['name'])) {
            $upload = $this->_do_upload();
            $data['course_file'] = $upload;
        }

        $training_form_id = $this->training->save_training_form($data);

        $this->training->save_acc_training_form($account_id, $training_form_id);

        $data_appr = array(
            'appr_mgr' => $this->input->post('appr_mgr'),
        );

        $appr_acc_id = $data_appr['appr_mgr'];

        $this->approval->save_appr_manager($appr_acc_id, $training_form_id);

        echo json_encode(array("status" => true));
    }

    private function _do_upload()
    {
        $config['upload_path'] = 'uploads/training_course';
        $config['allowed_types'] = 'gif|jpg|png|pdf|PDF';
        $config['max_size'] = 4096; //set max size allowed in Kilobyte
        // $config['max_width'] = 1000; // set max width image allowed
        // $config['max_height'] = 1000; // set max height allowed
        $config['file_name'] = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('course_file')) //upload and validate
        {
            $data['inputerror'][] = 'course_file';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = false;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function ajax_edit_training_form($training_form_id)
    {
        $data = $this->training->get_by_id($training_form_id);
        echo json_encode($data);
    }

    public function ajax_cancel_training($training_form_id)
    {
        $this->training->cancel_tra_form($training_form_id);

        echo json_encode(array("status" => true));
    }

    

    public function ajax_view_training($training_form_id)
    {
        $data = $this->training->get_tra_by_id_view($training_form_id);
        echo json_encode($data);
    }

  

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        if ($this->input->post('course_name') == '') {
            $data['inputerror'][] = 'course_name';
            $data['error_string'][] = '*กรุณาใส่ ชื่อหลักสูตรฝึกอบรมภายนอก';
            $data['status'] = false;
        }

        if ($this->input->post('place_of_course') == '') {
            $data['inputerror'][] = 'place_of_course';
            $data['error_string'][] = '*กรุณาใส่สถานที่ฝึกอบรมภายนอก ';
            $data['status'] = false;
        }

        if ($this->input->post('date') == '') {
            $data['inputerror'][] = 'date';
            $data['error_string'][] = '*กรุณาใส่ วันที่ฝึกอบรมภายนอก';
            $data['status'] = false;
        }

        if ($this->input->post('consistent_course') == '') {
            $data['inputerror'][] = 'consistent_course';
            $data['error_string'][] = 'กรุณาใส่ หัวข้อ IDP';
            $data['status'] = false;
        }

        if ($this->input->post('appr_mgr') == '') {
            $data['inputerror'][] = 'appr_mgr';
            $data['error_string'][] = 'กรุณาระบุ ผู้ต้นสังกัด(ระดับผู้จัดการขึ้นไป) ';
            $data['status'] = false;
        }

        if ($this->input->post('details_exp') == '') {
            $data['inputerror'][] = 'details_exp';
            $data['error_string'][] = 'กรุณากรอกรายละเอียดความคาดหวัง ';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}