<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class manpower_form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== true) :
            redirect('login');
        endif;
        // Load database
        $this->load->model('account_model', 'account_m');
        $this->load->model('manpower_form_m', 'manpower_form_m');
        $this->load->model('approval_m', 'approval_m');
        $this->load->model('managa_m', 'managa_m');
    }

    public function index()
    {
        $account_code = $this->session->userdata('code');
        $department_code = $this->session->userdata('department_code');

        $this->db->select('account_role.name_role');
        $this->db->from('account');
        $this->db->join('account_of_role', 'account_of_role.account_code = hr_account.code', 'LEFT');
        $this->db->join('account_role', 'hr_account_role.id = account_of_role.role_id', 'LEFT');
        $this->db->where('account_of_role.account_code', $account_code);
        $query = $this->db->get();
        $sql = $query->result();

        $data['name_role'] = $sql;
        $data['list_mgr'] = $this->account_m->get_list_mgr();
        $data['role'] = $this->account_m->get_role($account_code);
        $data['HRM'] = $this->account_m->get_hrm_admin($account_code);
        $data['bizplan'] = $this->manpower_form_m->get_bizplan($department_code);
        $data['replace'] = $this->manpower_form_m->get_replace($department_code);

        $this->load->view('manpower_form/manpower_form_v', $data);
    }

    public function get_bizplan_replace()
    {

        $department_code = $this->session->userdata('department_code');

        $data1 = $this->manpower_form_m->get_bizplan($department_code);
        $data2 = $this->manpower_form_m->get_replace($department_code);

        $data = [
            'bizplan' => $data1,
            'replace' => $data2,
        ];

        echo json_encode($data);
    }

    public function ajax_add_manpower_form()
    {
        $this->_validate();

        $code = $this->session->userdata('code');

        $this->db->select('hr_no,year');
        $this->db->from('manpower_form');
        $this->db->where('year', date('Y'));
        $this->db->order_by('hr_no', 'DESC');
        $this->db->order_by('year', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $sql = $query->result();

        foreach ($sql as $row) :
            $hr_no = $row->hr_no;
            $year =  $row->year;
        endforeach;

        $cur_year = date("Y");

        if (empty($year)) :
            $hr_no = 1;
            $year = date("Y");
        elseif ($cur_year == $year) :
            $hr_no = $hr_no + 1;
            $year = date("Y");
        else :
            $hr_no = 1;
            $year = date("Y");
        endif;

        // $this->_validate();

        $data = array(
            'type_of_rec' => $this->input->post('type_of_rec'),
            'bizplan' => $this->input->post('biz_id'),
            'replace' => $this->input->post('repl_id'),
            'rec_num' => $this->input->post('rec_num'), // *จำนวนท่ต้องการ
        );

        // ประเภทความต้องการ

        $type_of_rec = $data['type_of_rec'];
        $rec_num = $data['rec_num'];

        // เพิ่มจำนวน
        if ($type_of_rec == 0) :

            $biz_id = $data['bizplan'];

            $this->db->set('remaining_amount', $rec_num);
            $this->db->where('biz_id ', $biz_id);
            $this->db->update('bizplan_emp');
            $this->db->affected_rows();

            $bizplan = $this->manpower_form_m->get_bizplan_id($biz_id);
            foreach ($bizplan as $rows) :
                $cost_center = $rows->cost_cen;
                $sec_div_dept = $rows->cost_cen_posi;
                $req_posi_name = $rows->name_of_posi;
            endforeach;
            $pos_in_manp = 0; //มีตำแหน่งงานอยู่ในแผนอัตรากำลัง 0 ใช่ 1 ไม่ใช่
            $per_replaced = '';
            $reason_of_replaces = '';
            $dur_of_emp = '';
            $attach_doc3 = '';
        // เพิ่มจำนวน

        // ทดแทน
        elseif ($type_of_rec == 1) :

            $repl_id = $data['replace'];

            $this->db->set('remaining_amount', $rec_num);
            $this->db->where('repl_id  ', $repl_id);
            $this->db->update('replace_emp');
            $this->db->affected_rows();

            $replace = $this->manpower_form_m->get_replace_id($repl_id);

            foreach ($replace as $rows) :
                $cost_center = $rows->cost_cen;
                $sec_div_dept = $rows->cost_cen_posi;
                $req_posi_name = $rows->position_replace;
                $per_replaced = $rows->name_replace;
                $attach_doc3 = $rows->resignation_attach;
            endforeach;

            $pos_in_manp = '';
            $reason_of_replaces = 0; //เหตุผลของการทดแทน 0 ลาออก 1 ปลดออก 2 อื่นๆ
            $dur_of_emp = '';

        endif;
        // ทดแทน

        // ประเภทความต้องการ
        $form_data = array(
            'cost_center' => $cost_center, // Cost Center
            'sec_div_dept' => $sec_div_dept, //SEC/DIV/DEPT
            'req_posi_name' => $req_posi_name, //ตำแหน่งที่ขอ   
            'type_of_rec' => $type_of_rec, //ประเภทของความต้องการ
            'pos_in_manp' => $pos_in_manp, //มีตำแหน่งงานอยู่ในแผนอัตรากำลัง
            'reason_of_replaces' => $reason_of_replaces, //เหตุผลของการทดแทน
            'per_replaced' => $per_replaced, //บุคคลที่ภูกทดแทน
            'attach_doc3' => $attach_doc3, //ใบลาออกของพนักงาน
            'type_of_emp' => $this->input->post('type_of_emp'), //ประเภทของพนักงาน
            'type_of_employment' => $this->input->post('type_of_employment'), //ประเภทการจ้าง จ้างประจำ ชั่วคราว
            'dur_of_emp' => $dur_of_emp, //ระยะเวลาการจ้าง

            'hr_no' => $hr_no,
            'year' => $year,
            'rec_date' => $this->input->post('rec_date'),
            'rec_num' => $this->input->post('rec_num'), // *จำนวนท่ต้องการ
            'sou_of_person' => $this->input->post('sou_of_person'),
            'duty_resp' => $this->input->post('duty_resp'),
            'sex_emp' => $this->input->post('sex_emp'),
            'age_emp' => $this->input->post('age_emp'),
            'education_emp' => $this->input->post('education_emp'),
            'skill_expert' => $this->input->post('skill_expert'),
            'experience' => $this->input->post('experience'),
            'other' => $this->input->post('other'),
            'create_by' => $code,
        );

        if (!empty($_FILES['attach_doc1']['name'])) :
            $upload = $this->_do_upload();
            $form_data['attach_doc1'] = $upload;
        endif;

        if (!empty($_FILES['attach_doc2']['name'])) :
            $upload = $this->_do_upload2();
            $form_data['attach_doc2'] = $upload;
        endif;

        $form_id = $this->manpower_form_m->ajax_add_manpower_form($form_data);

        $mgr_code = $this->input->post('dept_mgr_code');

        $this->manpower_form_m->approval_by_mgr($form_id, $hr_no, $year, $mgr_code);

        $position = 'สำหรับหน่วยงานที่ขอในฐานะผู้จัดการฝ่าย';

        $this->mail_alert($hr_no, $year, $mgr_code, $position);

        echo json_encode(array("status" => true));
    }

    public function ajax_edit_manpower_form()
    {
        $code = $this->session->userdata('code');

        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');

        $form_data = array(
            'duty_resp' => $this->input->post('duty_resp'),
            'sex_emp' => $this->input->post('sex_emp'),
            'age_emp' => $this->input->post('age_emp'),
            'education_emp' => $this->input->post('education_emp'),
            'skill_expert' => $this->input->post('skill_expert'),
            'experience' => $this->input->post('experience'),
            'other' => $this->input->post('other'),
        );

        $this->manpower_form_m->ajax_add_form_agian($hr_no, $year, $form_data);

        $position = 'สำหรับหน่วยงานที่ขอในฐานะผู้จัดการฝ่าย';

        $mgr_code = $this->input->post('dept_mgr_code');

        $this->manpower_form_m->approval_by_mgr_agian($hr_no, $year, $mgr_code);

        $this->mail_alert($hr_no, $year, $mgr_code, $position);

        echo json_encode(array("status" => true));
    }

    private function _do_upload()
    {
        $code = $this->session->userdata('code');

        $config['upload_path'] = 'uploads/manp_form';
        $config['allowed_types'] = 'pdf|PDF';
        $config['max_size'] = 0; //set max size allowed in Kilobyte
        // $config['max_width'] = 1000; // set max width image allowed
        // $config['max_height'] = 1000; // set max height allowed
        // $config['file_name'] = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $config['file_name'] = 'File1_' . $code . '_' . date('Y');


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('attach_doc1')) //upload and validate
        {
            $data['inputerror'][] = 'attach_doc1';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = false;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload2()
    {
        $code = $this->session->userdata('code');
        
        $config['upload_path'] = 'uploads/manp_form';
        $config['allowed_types'] = 'pdf|PDF';
        $config['max_size'] = 0; //set max size allowed in Kilobyte
        // $config['max_width'] = 1000; // set max width image allowed
        // $config['max_height'] = 1000; // set max height allowed
        // $config['file_name'] = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $config['file_name'] = 'File2_' . $code . '_' . date('Y');

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('attach_doc2')) //upload and validate
        {
            $data['inputerror'][] = 'attach_doc2';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = false;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        if ($this->input->post('rec_date') == '') :
            $data['inputerror'][] = 'rec_date';
            $data['error_string'][] = '*ระบุ วันที่ต้องการ';
            $data['status'] = false;
        endif;

        if ($this->input->post('rec_num') == '') :
            $data['inputerror'][] = 'rec_num';
            $data['error_string'][] = '*ระบุ จำนวนที่ต้องการ';
            $data['status'] = false;
        endif;

        if ($this->input->post('duty_resp') == '') :
            $data['inputerror'][] = 'duty_resp';
            $data['error_string'][] = '*ระบุ หน้าที่ความรับผิดชอบ';
            $data['status'] = false;
        endif;

        // if ($this->input->post('attach_doc1') == '') :
        //     $data['inputerror'][] = 'attach_doc1';
        //     $data['error_string'][] = '*กรุณาแนบไฟล์เอกสาร แผนผังหน่วยงาน/แผนก';
        //     $data['status'] = false;
        // endif;

        // if ($this->input->post('attach_doc2') == '') :
        //     $data['inputerror'][] = 'attach_doc2';
        //     $data['error_string'][] = '*กรุณาแนบไฟล์เอกสาร คำบรรยายลักษณะงาน';
        //     $data['status'] = false;
        // endif;

        if ($this->input->post('sex_emp') == '') :
            $data['inputerror'][] = 'sex_emp';
            $data['error_string'][] = '*ระบุ อายุ';
            $data['status'] = false;
        endif;


        if ($this->input->post('age_emp') == '') :
            $data['inputerror'][] = 'age_emp';
            $data['error_string'][] = '*ระบุ อายุ';
            $data['status'] = false;
        endif;

        if ($this->input->post('education_emp') == '') :
            $data['inputerror'][] = 'education_emp';
            $data['error_string'][] = '*ระบุ การศึกษา';
            $data['status'] = false;
        endif;

        if ($this->input->post('skill_expert') == '') :
            $data['inputerror'][] = 'skill_expert';
            $data['error_string'][] = '*ระบุ ทักษะ/ความชำนาญ';
            $data['status'] = false;
        endif;

        if ($this->input->post('experience') == '') :
            $data['inputerror'][] = 'experience';
            $data['error_string'][] = '*ระบุประสบการณ์';
            $data['status'] = false;
        endif;

        if ($this->input->post('other') == '') :
            $data['inputerror'][] = 'other';
            $data['error_string'][] = '*ระบุอื่นๆ ';
            $data['status'] = false;
        endif;

        if ($data['status'] === false) :
            echo json_encode($data);
            exit();
        endif;
    }

    public function view_manp_form($hr_no, $year)
    {
        $data1 = $this->manpower_form_m->get_view_manp_form($hr_no, $year);

        foreach ($data1 as $row) :
            $dept_mgr = $row->dept_mgr_code;
            $agm = $row->agm_code;
            $gm = $row->gm_code;
            $hr = $row->hr_code;
            $hrm_mgr = $row->hrm_mgr_code;
            $hrm_agm = $row->hrm_agm_code;
            $od = $row->od_code;
            $evp = $row->evp_code;
            $svp = $row->svp_code;
        endforeach;

        $data2 = $this->account_m->get_account_code($dept_mgr);
        $data3 = $this->account_m->get_account_code($agm);
        $data4 = $this->account_m->get_account_code($gm);
        $data5 = $this->account_m->get_account_code($hr);
        $data6 = $this->account_m->get_account_code($hrm_mgr);
        $data7 = $this->account_m->get_account_code($hrm_agm);
        $data8 = $this->account_m->get_account_code($od);
        $data9 = $this->account_m->get_account_code($evp);
        $data10 = $this->account_m->get_account_code($svp);

        $data = [
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'data6' => $data6,
            'data7' => $data7,
            'data8' => $data8,
            'data9' => $data9,
            'data10' => $data10,
        ];

        echo json_encode($data);
    }

    public function mail_alert($hr_no, $year, $code, $position)
    {
        $data['form'] = $this->manpower_form_m->get_view_manp_form($hr_no, $year);

        $data['account'] = $this->account_m->get_account_code($code);

        foreach ($data['account'] as $row) :

            $email = $row->email;

        endforeach;

        $data['position'] = $position;

        $message = $this->load->view('mail_notify/mail_notify', $data, true);

        $to_email =  $email;

        $from_email = "noreply@tshpcl.com";

        // Load email library
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'noreply.publictraining@gmail.com',
            'smtp_pass' => 'HRD_publictraining',
            'mailtype' => 'html',
            'charset' => 'utf-8',
        );
        $this->load->library('email', $config);
        // $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
        $this->email->set_header('Content-type', 'text/html'); //must add this line
        $this->email->from($from_email, 'MANPOWER REQUISTION FORM'); //จากอีเมล์
        $this->email->to($to_email); // ส่ง อีเมล์
        $this->email->subject('Request for Approval Manpower Requistion Online'); // หัวข้อ
        $this->email->message($message); // รายละเอียด
        // Send mail
        // $send = $this->email->send();
        // $showerror = $this->email->print_debugger();
    }
}
