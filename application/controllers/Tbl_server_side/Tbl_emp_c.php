<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class tbl_emp_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') !== true) {
            redirect('login');
        }
        $this->load->model('tbl_emp_m', 'tbl_emp_m');
    }

    public function ajax_emp_list()
    {
        $list = $this->tbl_emp_m->get_datatables();

        $data = array();

        $no = $_POST['start'];

        foreach ($list as $emp) {
            $no++;
            $row = array();
            $row[]= $emp->hr_no.'/'.$emp->year;
            
            $type_of_rec = $emp->type_of_rec;
            if ($type_of_rec == 0) :
                $row[] = 'เพิ่มอัตรากำลัง';
            else :
                $row[] = 'ทดแทน';
            endif;

            $row[] = $emp->req_posi_name;
            $row[] = $emp->rec_date;
            $row[] = $emp->cost_center . ' ' . $emp->sec_div_dept;

            $hr_no = $emp->hr_no . '/' . $emp->year;

            if ($emp->status_form == 0) :
                $row[] = '<span style="font-size: 15px"
                    class="badge badge-secondary">รอดำเนินการ</span>';
                $row[] = $emp->remark_form;
                $row[] = '
                        <a class="btn btn-sm btn-success" href="javascript:void(0)" title="แบบฟอร์มใบขออนุมัติอัตรากำลัง/ใบขอกำลังคนในงบประมาณ" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>';
            elseif ($emp->status_form == 1) :
                $row[] = ' <span style="font-size: 15px"
                    class=" badge badge-success">แบบฟอร์มนี้ผ่านการอนุมัติ</span>';
                $row[] = $emp->remark_form;
                $row[] = '
                        <a class="btn btn-sm btn-success" href="javascript:void(0)" title="แบบฟอร์มใบขออนุมัติอัตรากำลัง/ใบขอกำลังคนในงบประมาณ" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>';
            else :
                $row[] = '<span style="font-size: 15px"
                    class=" badge badge-danger">แบบฟอร์มนี้ไม่ผ่านการอนุมัติ</span>';
                $row[] = $emp->remark_form;
                $row[] = '
                        <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="แก้ไขแบบฟอร์มใบขออนุมัติอัตรากำลัง/ใบขอกำลังคนในงบประมาณ" onclick="edit_manpower_form(' . "'" . $hr_no . "'" . ')">แก้ไขแบบฟอร์ม</a>
                        <a class="btn btn-sm btn-success" href="javascript:void(0)" title="แบบฟอร์มใบขออนุมัติอัตรากำลัง/ใบขอกำลังคนในงบประมาณ" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>
                        ';
            endif;


            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tbl_emp_m->count_all(),
            "recordsFiltered" => $this->tbl_emp_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
