<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Approval_manp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('logged_in') !== true) :
        //     redirect('login');
        // endif;
        // Load database
        $this->load->model('account_model', 'account_m');
        $this->load->model('manpower_form_m', 'manpower_form_m');
        $this->load->model('approval_m', 'approval_m');
    }

    // สำหรับหน่วยงานที่ขอ
    public function appr_by_mgr()
    {
        $code = $this->session->userdata('code');

        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_dept_mgr' => $this->input->post('status_dept_mgr'),
            'remark_dept_mgr' => $this->input->post('remark_dept_mgr'),
        );

        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');

        $status_dept_mgr = $this->input->post('status_dept_mgr');
        $remark_dept_mgr = $this->input->post('remark_dept_mgr');

        if ($status_dept_mgr == 1) :

            $chart = $this->approval_m->get_organ_chart($code);
            foreach ($chart as $rows) :
                $agm_code = $rows->agm_code;
                $gm_code = $rows->gm_code;
            endforeach;

            $status = 0;

            if ($agm_code != null) :
                $this->approval_m->approval_mgr_1($data, $agm_code, $status);
                $position = 'สำหรับหน่วยงานที่ขอในฐานะผู้ช่วยผู้จัดการทั่วไป';
                $this->mail_alert($hr_no, $year, $agm_code, $position);
            else :
                $this->approval_m->approval_mgr_2($data, $agm_code, $gm_code, $status);
                $position = 'สำหรับหน่วยงานที่ขอในฐานะผู้จัดการทั่วไป';
                $this->mail_alert($hr_no, $year, $gm_code, $position);
            endif;

        elseif ($status_dept_mgr == 2) :

            $agm_code = '';
            $gm_code = '';
            $this->approval_m->approval_mgr($data, $agm_code, $gm_code);

            $this->approval_m->disapproval_mgr($data);

        endif;

        echo json_encode(array("status" => true));
    }
    public function appr_by_agm()
    {
        $code = $this->session->userdata('code');

        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_agm' => $this->input->post('status_agm'),
            'remark_agm' => $this->input->post('remark_agm'),
        );

        $status_agm = $this->input->post('status_agm');

        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');

        if ($status_agm == 1) :

            $chart = $this->approval_m->get_organ_chart_2($code);

            foreach ($chart as $rows) :
                $gm_code = $rows->gm_code;
            endforeach;

            $status = 0;
            $this->approval_m->approval_agm($data, $gm_code, $status);

            $position = 'สำหรับหน่วยงานที่ขอในฐานะผู้จัดการทั่วไป';

            $this->mail_alert($hr_no, $year, $gm_code, $position);

        elseif ($status_agm == 2) :

            $this->approval_m->approval_agm($data);

            $this->approval_m->disapproval_agm($data);

            $this->notify_form($hr_no, $year);
        endif;
        echo json_encode(array("status" => true));
    }

    public function appr_by_gm()
    {
        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_gm' => $this->input->post('status_gm'),
            'remark_gm' => $this->input->post('remark_gm'),
        );

        $status_gm = $this->input->post('status_gm');
        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');

        if ($status_gm == 1) :

            $name_role = 'HR';

            $query = $this->approval_m->set_approval($name_role);

            foreach ($query as $row) :
                $hr_code = $row->code;
            endforeach;

            $status = 0;

            $this->approval_m->approval_gm($data, $hr_code, $status);

            $position = 'สำหรับเจ้าหน้าที่ฝ่าย HR';

            $this->mail_alert($hr_no, $year, $hr_code, $position);

        elseif ($status_gm == 2) :

            $hr_code = '';

            $this->approval_m->approval_gm($data, $hr_code);

            $this->approval_m->disapproval_gm($data);

            $this->notify_form($hr_no, $year);

        endif;

        echo json_encode(array("status" => true));
    }
    // สำหรับหน่วยงานที่ขอ

    // สำหรับ HR 
    public function appr_by_hr()
    {

        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_hr' => $this->input->post('status_hr'),
            'remark_hr' => $this->input->post('remark_hr'),
        );
        $status_hr = $this->input->post('status_hr');
        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');

        if ($status_hr == 1) :

            $hrm_mgr = '009018';

            $status = 0;

            $this->approval_m->approval_hr($data, $hrm_mgr, $status);

            $position = 'สำหรับสำนักพัฒนาองค์กรในฐานะผู้จัดการฝ่าย';

            $this->mail_alert($hr_no, $year, $hrm_mgr, $position);

        elseif ($status_hr == 2) :

            $hrm_mgr = '';
            $this->approval_m->approval_hr($data, $hrm_mgr);

            $this->approval_m->disapproval_hr($data);

            $this->notify_form($hr_no, $year);

        endif;
        echo json_encode(array("status" => true));
    }
    // สำหรับ HR 

    // สำหรับสำนักพัฒนาองค์กร
    public function appr_by_hrm_mgr()
    {
        $code = $this->session->userdata('code');

        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_hrm_mgr' => $this->input->post('status_hrm_mgr'),
            'remark_hrm_mgr' => $this->input->post('remark_hrm_mgr'),
        );

        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');
        $status_hrm_mgr = $this->input->post('status_hrm_mgr');

        if ($status_hrm_mgr == 1) :

            $chart = $this->approval_m->get_organ_chart($code);

            foreach ($chart as $rows) :
                $agm_code = $rows->agm_code;
                $gm_code = $rows->gm_code;
            endforeach;

            $status = 0;

            $this->approval_m->approval_hrm_mgr($data, $agm_code, $gm_code, $status);

            if ($agm_code != null) :
                $position = 'สำหรับสำนักพัฒนาองค์กรในฐานะผู้ช่วยผู้จัดการทั่วไป';

                $this->mail_alert($hr_no, $year, $agm_code, $position);
            else :
                $position = 'สำหรับสำนักพัฒนาองค์กรในฐานะผู้จัดการทั่วไป';

                $this->mail_alert($hr_no, $year, $gm_code, $position);
            endif;

        elseif ($status_hrm_mgr == 2) :

            $agm_code = '';

            $gm_code = '';

            $this->approval_m->approval_hrm_mgr($data, $agm_code, $gm_code);

            $this->approval_m->disapproval_hrm_mgr($data);

            $this->notify_form($hr_no, $year);

        endif;

        echo json_encode(array("status" => true));
    }

    public function appr_by_hrm_agm()
    {
        $code = $this->session->userdata('code');

        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_hrm_agm' => $this->input->post('status_hrm_agm'),
            'remark_hrm_agm' => $this->input->post('remark_hrm_agm'),
        );
        $status_hrm_agm = $this->input->post('status_hrm_agm');
        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');

        if ($status_hrm_agm == 1) :

            $chart = $this->approval_m->get_organ_chart_2($code);

            foreach ($chart as $rows) :
                $gm_code = $rows->gm_code;
            endforeach;
            $status = 0;

            $this->approval_m->approval_hrm_agm($data, $status);

            $position = 'สำหรับสำนักพัฒนาองค์กรในฐานะผู้จัดการทั่วไป';

            $this->mail_alert($hr_no, $year, $gm_code, $position);
        elseif ($status_hrm_agm == 2) :

            $this->approval_m->approval_hrm_agm($data);

            $this->approval_m->disapproval_hrm_agm($data);

            $this->notify_form($hr_no, $year);

        endif;

        echo json_encode(array("status" => true));
    }

    public function appr_by_hrm_gm()
    {
        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_od' => $this->input->post('status_od'),
            'remark_od' => $this->input->post('remark_od'),
        );

        $status_od = $this->input->post('status_od');
        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');

        if ($status_od == 1) :

            // นายสาโรจน์ วสุวานิช รองประธานธรรมการบริหาร
            $evp_code = '006271';

            $status = 0;

            $this->approval_m->approval_hrm_gm($data, $evp_code, $status);

            $position = 'สำหรับการพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการบริหาร';

            $this->mail_alert($hr_no, $year, $evp_code, $position);
        elseif ($status_od == 2) :

            $evp_code = '';

            $this->approval_m->approval_hrm_gm($data, $evp_code);

            $this->approval_m->disapproval_hrm_gm($data);

            $this->notify_form($hr_no, $year);

        endif;

        echo json_encode(array("status" => true));
    }
    // สำหรับสำนักพัฒนาองค์กร

    // การพิจารณาลงนามอนุมัติท่านรองประธานกรรมการ
    public function appr_by_evp()
    {
        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_evp' => $this->input->post('status_evp'),
            'remark_evp' => $this->input->post('remark_evp'),
        );
        $status = $this->input->post('status_evp');

        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');

        if ($status == 1) :
            // ตรวจสอบเงื่อนไงของ ประเภทของพนักงาน 1= บริหารระดับสูง 2 บริหารระดับกลาง
            $data2 = $this->manpower_form_m->get_view_manp_form($hr_no, $year);

            foreach ($data2 as $row) :

                $type_of_emp = $row->type_of_emp;

            endforeach;

            // ตรวจสอบเงื่อนไงของ ประเภทของพนักงาน 1= ผู้บริหาร
            if ($type_of_emp != 1) :

                $svp_code = null;

                $status = 0;

                $this->approval_m->approval_evp($data, $svp_code, $status);

                $this->approval_m->update_status_evp($data);

                $this->notify_form($hr_no, $year);

            else :
                // ชนาพรรณ จึงรุ่งเรื่องกิจ
                $svp_code = '';

                $status = 0;

                $this->approval_m->approval_evp($data, $svp_code, $status);

                $position = 'สำหรับการพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการอาวุโส';

                $this->mail_alert($hr_no, $year, $svp_code, $position);


            endif;
        // ตรวจสอบเงื่อนไงของ ประเภทของพนักงาน 1= บริหารระดับสูง 2 บริหารระดับกลาง

        elseif ($status == 2) :

            $this->approval_m->disapproval_evp($data);

            $this->approval_m->update_status_evp($data);

            $this->notify_form($hr_no, $year);

        endif;

        echo json_encode(array("status" => true));
    }

    public function appr_by_svp()
    {
        $data = array(
            'hr_no' => $this->input->post('hr_no'),
            'year' => $this->input->post('year'),
            'status_svp' => $this->input->post('status_svp'),
            'remark_svp' => $this->input->post('remark_svp'),
        );

        $hr_no = $this->input->post('hr_no');
        $year = $this->input->post('year');
        $status = $this->input->post('status_svp');

        if ($status == 1) :

            $this->approval_m->approval_svp($data);

            $this->approval_m->update_status_svp($data);

            $this->notify_form($hr_no, $year);

        elseif ($status == 2) :

            $this->approval_m->approval_svp($data);

            $this->approval_m->update_status_svp($data);

            $this->notify_form($hr_no, $year);

        endif;

        echo json_encode(array("status" => true));
    }
    // การพิจารณาลงนามอนุมัติท่านรองประธานกรรมการ

    public function mail_alert($hr_no, $year, $code, $position)
    {
        $data['form'] = $this->manpower_form_m->get_view_manp_form($hr_no, $year);

        $data['account'] = $this->account_m->get_account_code($code);

        foreach ($data['account'] as $row) :

            $email = $row->email;

        endforeach;

        $data['position'] = $position;

        $message = $this->load->view('mail_notify/mail_notify', $data, true);

        $to_email = $email;

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

    public function notify_form($hr_no, $year)
    {
        $data['form'] = $this->manpower_form_m->get_view_manp_form($hr_no, $year);

        foreach ($data['form'] as $row) :

            $email = $row->email;

        endforeach;

        $message = $this->load->view('mail_notify/emp_notify', $data, true);

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
