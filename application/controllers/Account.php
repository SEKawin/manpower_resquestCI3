<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class account extends CI_Controller
{

    public $PAGE;

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') !== true) {
            redirect('login');
        }

        // Load Pagination library
        $this->load->library('pagination');

        // Load database
        $this->load->model('account_model', 'account_m');
        $this->load->model('Organ_chart_m', 'organ_chart_m');

    }

    public function index()
    {
        $this->load->view('account/account_v');
    }

    public function manage()
    {
        $data['list_office'] = $this->account_m->list_office();
        $data['list_department'] = $this->account_m->list_department();
        $data['list_division'] = $this->account_m->list_division();
        $data['list_section'] = $this->account_m->list_section();

        $this->load->view('account/manage_v', $data);
    }

    public function approver_list()
    {
        $data['list_organ'] = $this->account_m->get_organ_chart_all();
        $data['list_emp'] = $this->account_m->get_all_account();
        
        $this->load->view('account/approver_v', $data);
    }

    
    public function ajax_add_account()
    {
        $this->_validate();
        // DATA PREPARATION
        $data = array(
            'code' => $this->input->post('code'),
            'firstname_th' => $this->input->post('firstname_th'),
            'lastname_th' => $this->input->post('lastname_th'),
            'username' => $this->input->post('code'),
            'salutation' => $this->input->post('salutation'),
            'firstname_en' => $this->input->post('firstname_en'),
            'lastname_en' => $this->input->post('lastname_en'),
            'sex' => $this->input->post('sex'),
            'idcard' => $this->input->post('idcard'),
            'position' => $this->input->post('position'),
            'startwork' => $this->input->post('startwork'),
            'birthdate' => $this->input->post('birthdate'),
            'education' => $this->input->post('education'),
            'section_code' => $this->input->post('section_code'),
            'section_title' => $this->input->post('section_title'),
            'division_code' => $this->input->post('division_code'),
            'division_title' => $this->input->post('division_title'),
            'department_code' => $this->input->post('department_code'),
            'department_title' => $this->input->post('department_title'),
            'office_code' => $this->input->post('office_code'),
            'office_title' => $this->input->post('office_title'),
            'email' => $this->input->post('email'),
            'password' => md5(substr($this->input->post('idcard'), -4)),
        );

        $code = $data['code'];
        
        $insert_id = $this->account_m->save_account($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_edit_account($emp_code)
    {

        $data = $this->account_m->get_account_code($emp_code);

        echo json_encode($data);
    }

    public function ajax_views_account($emp_code)
    {
        $data = $this->account_m->get_account_code($emp_code);
        echo json_encode($data);
    }

    public function ajax_update_account()
    {
        $this->_validate();
        date_default_timezone_set('Asia/Bangkok');
        $date_now = date("Y-m-d H:i:s");
        $data = array(
            'account_id' => $this->input->post('account_id'),
            'code' => $this->input->post('code'),
            'firstname_th' => $this->input->post('firstname_th'),
            'lastname_th' => $this->input->post('lastname_th'),
            'username' => $this->input->post('code'),
            'salutation' => $this->input->post('salutation'),
            'firstname_en' => $this->input->post('firstname_en'),
            'lastname_en' => $this->input->post('lastname_en'),
            'sex' => $this->input->post('sex'),
            'idcard' => $this->input->post('idcard'),
            'position' => $this->input->post('position'),
            'startwork' => $this->input->post('startwork'),
            'birthdate' => $this->input->post('birthdate'),
            'education' => $this->input->post('education'),
            'section_code' => $this->input->post('section_code'),
            'section_title' => $this->input->post('section_title'),
            'division_code' => $this->input->post('division_code'),
            'division_title' => $this->input->post('division_title'),
            'department_code' => $this->input->post('department_code'),
            'department_title' => $this->input->post('department_title'),
            'office_code' => $this->input->post('office_code'),
            'office_title' => $this->input->post('office_title'),
            'email' => $this->input->post('email'),
            'password' => md5(substr($this->input->post('idcard'), -4)),
            'update_on' => $date_now,
        );

        $this->account_m->update_account(array('account_id' => $this->input->post('account_id')), $data);

        echo json_encode(array("status" => true));
    }

    public function remove($code)
    {
        //remove file
        $this->account_m->remove_by_code($code);

        echo json_encode(array("status" => true));
    }
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        if ($this->input->post('code') == '') {
            $data['inputerror'][] = 'code';
            $data['error_string'][] = '*กรุณาใส่ รหัสพนักงาน';
            $data['status'] = false;
        }

        if ($this->input->post('salutation') == '') {
            $data['inputerror'][] = 'salutation';
            $data['error_string'][] = '*กรุณาใส่ คำนำหน้า';
            $data['status'] = false;
        }

        if ($this->input->post('firstname_th') == '') {
            $data['inputerror'][] = 'firstname_th';
            $data['error_string'][] = '*กรุณาใส่ ชื่อ ';
            $data['status'] = false;
        }

        if ($this->input->post('lastname_th') == '') {
            $data['inputerror'][] = 'lastname_th';
            $data['error_string'][] = '*กรุณาใส่ นามสกุล';
            $data['status'] = false;
        }

        if ($this->input->post('department_code') == '') {
            $data['inputerror'][] = 'department_code';
            $data['error_string'][] = 'กรุณาระบุ รหัสฝ่าย';
            $data['status'] = false;
        }
        if ($this->input->post('department_title') == '') {
            $data['inputerror'][] = 'department_title';
            $data['error_string'][] = 'กรุณาระบุ ชื่อฝ่าย';
            $data['status'] = false;
        }
        if ($this->input->post('idcard') == '') {
            $data['inputerror'][] = 'idcard';
            $data['error_string'][] = 'กรุณาใส่ รหัวบัตรประชาชน';
            $data['status'] = false;
        }
        if ($this->input->post('firstname_en') == '') {
            $data['inputerror'][] = 'firstname_en';
            $data['error_string'][] = 'กรุณาใส่ ชื่อ (อังกฤษ)';
            $data['status'] = false;
        }
        if ($this->input->post('lastname_en') == '') {
            $data['inputerror'][] = 'lastname_en';
            $data['error_string'][] = 'กรุณาใส่ นามสกุล (อังกฤษ)';
            $data['status'] = false;
        }
        if ($this->input->post('sex') == '') {
            $data['inputerror'][] = 'sex';
            $data['error_string'][] = 'กรุณาระบุ เพศ';
            $data['status'] = false;
        }
        if ($this->input->post('position') == '') {
            $data['inputerror'][] = 'position';
            $data['error_string'][] = 'กรุณาระบุ ตำแหน่ง';
            $data['status'] = false;
        }
        if ($this->input->post('startwork') == '') {
            $data['inputerror'][] = 'startwork';
            $data['error_string'][] = 'กรุณาระบุวันที่เริ่มทำงาน';
            $data['status'] = false;
        }
        if ($this->input->post('birthdate') == '') {
            $data['inputerror'][] = 'birthdate';
            $data['error_string'][] = 'กรุณาระบุ วันเกิด';
            $data['status'] = false;
        }
        if ($this->input->post('education') == '') {
            $data['inputerror'][] = 'education';
            $data['error_string'][] = 'กรุณาใส่ การศึกษา';
            $data['status'] = false;
        }

        // if ($this->input->post('email') == '') {
        //     $data['inputerror'][] = 'email';
        //     $data['error_string'][] = 'กรุณาใส่ อีเมล์';
        //     $data['status'] = false;
        // }

        if ($this->input->post('section_code') == '') {
            $data['inputerror'][] = 'section_code';
            $data['error_string'][] = 'กรุณาใส่ รหัสแผนก';
            $data['status'] = false;
        }
        if ($this->input->post('section_title') == '') {
            $data['inputerror'][] = 'section_title';
            $data['error_string'][] = 'กรุณาใส่ ชื่อแผนก';
            $data['status'] = false;
        }
        if ($this->input->post('division_code') == '') {
            $data['inputerror'][] = 'division_code';
            $data['error_string'][] = 'กรุณาใส่ รหัสส่วน';
            $data['status'] = false;
        }
        if ($this->input->post('division_title') == '') {
            $data['inputerror'][] = 'division_title';
            $data['error_string'][] = 'กรุณาใส่ ชื่อส่วน';
            $data['status'] = false;
        }
        if ($this->input->post('office_code') == '') {
            $data['inputerror'][] = 'office_code';
            $data['error_string'][] = 'กรุณาใส่ ชื่อสำนัก';
            $data['status'] = false;
        }
        if ($this->input->post('office_title') == '') {
            $data['inputerror'][] = 'office_title';
            $data['error_string'][] = 'กรุณาใส่ ชื่อสำนัก';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_add_manager_organ()
    {
        $data = array(
            'deptmgr_code' => $this->input->post('deptmgr_code'),
            'agm_code' => $this->input->post('agm_code'),
            'gm_code' => $this->input->post('gm_code'),
        );

        $this->organ_chart_m->add_manager_organ($data);
        echo json_encode(array("status" => true));
    }

    public function ajax_edit_manager_organ($id)
    {
        $data = $this->organ_chart_m->edit_manager_organ($id);

        echo json_encode($data);
    }

    public function ajax_update_manager_organ()
    {
        $data = array(
            'deptmgr_code' => $this->input->post('deptmgr_code'),
            'agm_code' => $this->input->post('agm_code'),
            'gm_code' => $this->input->post('gm_code'),
        );

        $this->organ_chart_m->update_manger_organ(array('id' => $this->input->post('organ_id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_remove_manager_organ($id){

        $this->db->delete('hr_organ_chart', array('id' => $id));

        echo json_encode(array("status" => true));

    }
}
