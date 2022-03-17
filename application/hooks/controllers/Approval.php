<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Approval extends CI_Controller
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

    public function ajax_approval_send()
    {
        $account_id = $this->session->userdata('account_id');

        $data = array(
            'training_form_id' => $this->input->post('training_form_id'),
            'status_mgr_office' => $this->input->post('status_mgr_office'), // lv1
            'remark_mgr_office' => $this->input->post('remark_mgr_office'), // lv1
            'status_hrd_section' => $this->input->post('status_hrd_section'), //lv3
            'remark_hrd_section' => $this->input->post('remark_hrd_section'), //lv3
            'status_hrd_mgr' => $this->input->post('status_hrd_mgr'), //lv4
            'remark_hrd_mgr' => $this->input->post('remark_hrd_mgr'), //lv4
            'status_od_mgr' => $this->input->post('status_od_mgr'), //lv5
            'remark_od_mgr' => $this->input->post('remark_od_mgr'), //lv5
            'status_evp' => $this->input->post('status_evp'), //lv6
            'remark_evp' => $this->input->post('remark_evp'), //lv6
        );

        $training_form_id = $data['training_form_id'];

        $get_tbl_approval = $this->approval->get_tbl_approval($account_id, $training_form_id);
        foreach ($get_tbl_approval as $rows) {
            $acc_id = $rows->acc_id;
            $acc_tra_id = $rows->tra_id;
            $level = $rows->level;
            //ระดับผู้จัดการขึ้นไป
            if ($account_id == $acc_id && $level == '1') {
                $status_appr = $data['status_mgr_office'];
                if ($status_appr == 1) {
                    $remark = $data['remark_mgr_office'];
                    $acc_tra_id;
                    $level;

                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);

                    $next_level = 2;
                    $appr_acc_id = '366'; // คุณศิริวรรณ หัวหน้าแผนก HRD
                    $this->approval->save_next_appr($appr_acc_id, $acc_tra_id, $next_level);
                    echo json_encode(array("status" => true));
                } elseif ($status_appr == 2) {
                    $remark = $data['remark_mgr_office'];
                    $acc_tra_id;
                    $level;
                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);
                    echo json_encode(array("status" => true));
                }
                //หัวหน้าส่วน HRD

            } elseif ($account_id == $acc_id && $level == '3') {
                // echo 'lv หัวหน้าส่วน';
                $status_appr = $data['status_hrd_section'];
                $remark = $data['remark_hrd_section'];
                if ($status_appr == 1) {
                    $acc_tra_id;
                    $level;
                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);

                    $next_level = 4;
                    $appr_acc_id = '214'; // คุณทิวาวรรณ ผู้จัดการฝ่ายHRD
                    $this->approval->save_next_appr($appr_acc_id, $acc_tra_id, $next_level);
                    echo json_encode(array("status" => true));

                } elseif ($status_appr == 2) {
                    $acc_tra_id;
                    $level;
                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);
                    echo json_encode(array("status" => true));
                }
                // ผู้จัดการฝ่าย HRD
            } elseif ($account_id == $acc_id && $level == '4') {
                $status_appr = $data['status_hrd_mgr'];
                if ($status_appr == 1) {
                    $remark = $data['remark_hrd_mgr'];
                    $acc_tra_id;
                    $level;
                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);

                    $next_level = 5;
                    $appr_acc_id = '398'; // คุณพยัพ ผู้จัดการทั่วไป OD
                    $this->approval->save_next_appr($appr_acc_id, $acc_tra_id, $next_level);
                    echo json_encode(array("status" => true));
                } elseif ($status_appr == 2) {
                    $remark = $data['remark_hrd_mgr'];
                    $acc_tra_id;
                    $level;
                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);
                    echo json_encode(array("status" => true));
                }
                // ผู้ช่วยผู้จัดการทั่วไป / ผู้จัดการทั่วไปสน.พัฒนาองค์กร
            } elseif ($account_id == $acc_id && $level == '5' && $training_form_id == $acc_tra_id) {
                $status_appr = $data['status_od_mgr'];
                if ($status_appr == 1) {
                    $remark = $data['remark_od_mgr'];
                    $acc_tra_id;
                    $level;

                    $check_training = $this->approval->get_check_training($acc_tra_id);
                    foreach ($check_training as $rows) {
                        $price = $rows->price;
                        if ($price >= '10000') {
                            // echo 'ราคามากกว่า 10,0000';
                            $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);

                            $next_level = 5;
                            $appr_acc_id = '286'; // คุณสาโรจน์
                            $this->approval->save_next_appr($appr_acc_id, $acc_tra_id, $next_level);
                        } else {
                            // echo 'ราคาน้อยกว่า 10,000';
                            $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);
                        }
                    }
                    echo json_encode(array("status" => true));
                } elseif ($status_appr == 2) {
                    $remark = $data['remark_od_mgr'];
                    $acc_tra_id;
                    $level;
                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);
                    echo json_encode(array("status" => true));
                }
                //รองประธานกรรมการบริหาร
            } elseif ($account_id == $acc_id && $level == '6') {
                $status_appr = $data['status_hrd_mgr'];
                if ($status_appr == 1) {
                    $remark = $data['remark_hrd_mgr'];
                    $acc_tra_id;
                    $level;
                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);

                    echo json_encode(array("status" => true));
                } elseif ($status_appr == 2) {
                    $remark = $data['remark_hrd_mgr'];
                    $acc_tra_id;
                    $level;
                    $this->approval->update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark);
                    echo json_encode(array("status" => true));
                }
            }
        }
    }

    public function ajax_chk_by_hrd()
    {
        $account_id = $this->session->userdata('account_id');

        $data = array('training_form_id' => $this->input->post('training_form_id'));

        $training_form_id = $data['training_form_id'];

        $chk_tr_course = array(
            'cost' => $this->input->post('cost'),
            'price' => $this->input->post('price'),
            'tax' => $this->input->post('tax'),
            'phase' => $this->input->post('phase'),
        );

        $approval = array(
            'status_appr' => $this->input->post('status_hrd_division'),
            'remark' => $this->input->post('remark_hrd_division'), //lv3
        );

        $get_tbl_approval = $this->approval->get_tbl_approval($account_id, $training_form_id);
        foreach ($get_tbl_approval as $rows) {
            $acc_id = $rows->acc_id;
            $acc_tra_id = $rows->tra_id;
            $level = $rows->level;

            if ($account_id == $acc_id && $level == '2') {

                // บันทึก ตรวจสอบหลักสูตรฝึกอบรมภายนอก
                $this->approval->chk_tra_by_appr($account_id, $acc_tra_id, $chk_tr_course);

                // อนุมัติลงฐานข้อมูล
                $this->approval->update_appr_by_hrd($account_id, $acc_tra_id, $level, $approval);
                //     die;
                //     // Next Approval level 3 is hrd division
                $next_level = 3;
                $appr_acc_id = '285'; // คุณวันวลิต หัวหน้าส่วน HRD
                $this->approval->save_next_appr($appr_acc_id, $acc_tra_id, $next_level);
            }
        }
        echo json_encode(array("status" => true));
    }

    public function chk_status_training($acc_tra_id)
    {
        $data = $this->training->get_chk_tra_by_id($acc_tra_id);

        echo json_encode($data);
    }
}
