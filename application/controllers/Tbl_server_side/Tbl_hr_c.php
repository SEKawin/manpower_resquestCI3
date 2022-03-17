<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class tbl_hr_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') !== true) {
            redirect('login');
        }

        $this->load->model('tbl_hr_m', 'tbl_hr_m');
    }

    public function ajax_hr_list()
    {
        $list = $this->tbl_hr_m->get_datatables_hr();

        $data = array();

        $no = $_POST['start'];

        foreach ($list as $rows) {
            $no++;
            $row = array();
            $row[] = $rows->hr_no . '/' . $rows->year;
            $row[] = $rows->code . '<br>' . $rows->firstname_th . ' ' . $rows->lastname_th;
            $row[] = $rows->req_posi_name;
            $row[] = $rows->rec_date;
            $row[] = $rows->cost_center . ' ' . $rows->sec_div_dept;
            if ($rows->status_hr == 0) :
                $row[] = '<span style="font-size: 15px"
                class="badge badge-secondary">รอดำเนินการ</span>';
            elseif ($rows->status_hr == 1) :
                $row[] = ' <span style="font-size: 15px"
                class=" badge badge-success">เอกสารครบถ้วน</span>';
            else :
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-danger">เอกสารไม่ครบถ้วน</span>';
            endif;

            $row[] = $rows->remark_hr;

            $hr_no = $rows->hr_no . '/' . $rows->year;

            if ($rows->status_hr == 0) :
                $row[] = '
            <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="เจ้าหน้าที่ HR ตรวจสอบแบบฟอร์ม" onclick="form_approval_by_hr(' . "'" . $hr_no . "'" . ')">ทำการอนุมัติ</a>';
            else :
                $row[] = '
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="เจ้าหน้าที่ HR ตรวจสอบแบบฟอร์ม" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>';
            endif;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tbl_hr_m->count_all(),
            "recordsFiltered" => $this->tbl_hr_m->count_filtered_hr(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_hr_all_list()
    {
        $list = $this->tbl_hr_m->get_datatables_all();

        $data = array();

        $no = $_POST['start'];

        foreach ($list as $rows) {
            $no++;
            $row = array();
            $row[] = $rows->hr_no . '/' . $rows->year;
            $row[] = $rows->code . '<br>' . $rows->firstname_th . ' ' . $rows->lastname_th;
            if ($rows->type_of_rec == 0) :
                $row[] = 'เพิ่มอัตรากำลัง';
            elseif ($rows->type_of_rec == 1) :
                $row[] = 'ทดแทน';
            endif;

            $row[] = $rows->req_posi_name;
            $row[] = $rows->rec_date;
            $row[] = $rows->cost_center . ' ' . $rows->sec_div_dept;
            if ($rows->status_form == 0) :
                $row[] = '<span style="font-size: 15px"
                class="badge badge-secondary">รอดำเนินการ</span>';
            elseif ($rows->status_form == 1) :
                $row[] = ' <span style="font-size: 15px"
                class=" badge badge-success">แบบฟอร์มนี้ผ่านการอนุมัติ</span>';
            else :
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-danger">แบบฟอร์มนี้ไม่ผ่านการอนุมัติ</span>';
            endif;

            $row[] = $rows->remark_form;

            $hr_no = $rows->hr_no . '/' . $rows->year;

            if ($rows->status_form == 0) :
                $row[] = '
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="แบบฟอร์มขออนุมัติอัตรากำลัง/กำลังคนในงบประมาณ" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>
            <a class="btn btn-sm btn-info" href="' . site_url('report/manpower_form') . "/" . $hr_no . '" title="พิมพ์แบบฟอร์มเอกสารชุดนี้" target="_blank">พิมพ์แบบฟอร์มเอกสารชุดนี้</a>
            ';
            elseif ($rows->status_form == 1) :
                $row[] = '
                <a class="btn btn-sm btn-success" href="javascript:void(0)" title="แบบฟอร์มขออนุมัติอัตรากำลัง/กำลังคนในงบประมาณ" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>
                <a class="btn btn-sm btn-info" href="' . site_url('report/manpower_form') . "/" . $hr_no . '" title="พิมพ์แบบฟอร์มเอกสารชุดนี้" target="_blank">พิมพ์แบบฟอร์มเอกสารชุดนี้</a>
                ';
            elseif ($rows->status_form == 2) :
                $row[] = '
                <a class="btn btn-sm btn-success" href="javascript:void(0)" title="แบบฟอร์มขออนุมัติอัตรากำลัง/กำลังคนในงบประมาณ" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>
                ';
            endif;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tbl_hr_m->count_all(),
            "recordsFiltered" => $this->tbl_hr_m->count_filtered_all(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
