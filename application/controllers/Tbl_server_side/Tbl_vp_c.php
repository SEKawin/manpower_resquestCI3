<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class tbl_vp_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('logged_in') !== true) {
        //     redirect('login');
        // }
        $this->load->model('tbl_vp_m', 'tbl_vp_m');
    }

    public function ajax_evp_list()
    {
        $list = $this->tbl_vp_m->get_datatables_evp();
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

            if ($rows->status_evp == 0 || $rows->status_evp == NULL) :
                $row[] = '<span style="font-size: 15px"
                class="badge badge-secondary">รอดำเนินการ</span>';
            elseif ($rows->status_evp == 1) :
                $row[] = ' <span style="font-size: 15px"
                class=" badge badge-success">เห็นควรอนุมัติ</span>';
            else :
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-danger">ไม่ผ่านการอนุมัติ</span>';
            endif;

            $row[] = $rows->remark_evp;

            $hr_no = $rows->hr_no . '/' . $rows->year;

            if ($rows->status_evp == 0) :
                $row[] = '
            <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="สำหรับหน่วยงานที่ขอ" onclick="form_approval_vp(' . "'" . $hr_no . "'" . ')">ทำการอนุมัติ</a>
            ';
            else :
                $row[] = '
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="สำหรับหน่วยงานที่ขอ" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>
            ';
            endif;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tbl_vp_m->count_all(),
            "recordsFiltered" => $this->tbl_vp_m->count_filtered_evp(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_svp_list()
    {
        $list = $this->tbl_vp_m->get_datatables_svp();

        $data = array();

        $no = $_POST['start'];

        foreach ($list as $rows) {

            $no++;
            $row = array();
            $row[] = $rows->code . '<br>' . $rows->firstname_th . ' ' . $rows->lastname_th;
            $row[] = $rows->req_posi_name;
            $row[] = $rows->rec_date;
            $row[] = $rows->cost_center . ' ' . $rows->sec_div_dept;

            if ($rows->status_svp == 0 || $rows->status_svp == NULL) :
                $row[] = '<span style="font-size: 15px"
                class="badge badge-secondary">รอดำเนินการ</span>';
            elseif ($rows->status_svp == 1) :
                $row[] = ' <span style="font-size: 15px"
                class=" badge badge-success">เห็นควรอนุมัติ</span>';
            else :
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-danger">ไม่ผ่านการอนุมัติ</span>';
            endif;

            $row[] = $rows->remark_svp;
            $hr_no = $rows->hr_no . '/' . $rows->year;

            $row[] = '
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการอาวุโส" onclick="form_approval_vp(' . "'" . $hr_no . "'" . ')">อนุมัติ</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tbl_vp_m->count_all(),
            "recordsFiltered" => $this->tbl_vp_m->count_filtered_svp(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
