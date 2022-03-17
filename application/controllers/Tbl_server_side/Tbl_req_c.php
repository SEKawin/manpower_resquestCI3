<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class tbl_req_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('logged_in') !== true) {
        //     redirect('login');
        // }
        $this->load->model('tbl_req_m', 'tbl_req_m');
    }

    public function ajax_mgr_list()
    {
        $list = $this->tbl_req_m->get_datatables_mgr();
        
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

            if ($rows->status_dept_mgr == 0 || $rows->status_dept_mgr == NULL) :
                $row[] = '<span style="font-size: 15px"
                class="badge badge-secondary">รอดำเนินการ</span>';
            elseif ($rows->status_dept_mgr == 1) :
                $row[] = ' <span style="font-size: 15px"
                class=" badge badge-success">เห็นควรอนุมัติ</span>';
            else :
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-danger">ไม่เห็นควรอนุมัติ</span>';
            endif;

            $row[] = $rows->remark_mgr;
            $hr_no = $rows->hr_no . '/' . $rows->year;
            if ($rows->status_dept_mgr == 0) :
                $row[] = '
            <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="สำหรับหน่วยงานที่ขอ" onclick="form_requested_mgr(' . "'" . $hr_no . "'" . ')">ทำการอนุัมัติ</a>';
            else :
                $row[] = '
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="สำหรับหน่วยงานที่ขอ" onclick="view_manp_form(' . "'" . $hr_no . "'" . ')">ดูแบบฟอร์ม</a>';
            endif;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tbl_req_m->count_all(),
            "recordsFiltered" => $this->tbl_req_m->count_filtered_mgr(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_agm_list()
    {
        $list = $this->tbl_req_m->get_datatables_agm();

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

            if ($rows->status_agm == 0 || $rows->status_agm == NULL) :
                $row[] = '<span style="font-size: 15px"
                class="badge badge-secondary">รอดำเนินการ</span>';
            elseif ($rows->status_agm == 1) :
                $row[] = ' <span style="font-size: 15px"
                class=" badge badge-success">เห็นควรอนุมัติ</span>';
            else :
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-danger">ไม่เห็นควรอนุมัติ</span>';
            endif;

            $row[] = $rows->remark_agm;
            $้hr_no = $rows->hr_no . '/' . $rows->year;
            if ($rows->status_agm == 0) :
                $row[] = '
            <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="สำหรับหน่วยงานที่ขอ" onclick="form_requested_agm(' . "'" . $้hr_no . "'" . ')">ทำการอนุัมัติ</a>';
            else :
                $row[] = '
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="สำหรับหน่วยงานที่ขอ" onclick="view_manp_form(' . "'" . $้hr_no . "'" . ')">ดูแบบฟอร์ม</a>
            ';
            endif;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tbl_req_m->count_all(),
            "recordsFiltered" => $this->tbl_req_m->count_filtered_agm(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_gm_list()
    {
        $list = $this->tbl_req_m->get_datatables_gm();

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

            if ($rows->status_gm == 0 || $rows->status_gm == NULL) :
                $row[] = '<span style="font-size: 15px"
                class="badge badge-secondary">รอดำเนินการ</span>';
            elseif ($rows->status_gm == 1) :
                $row[] = ' <span style="font-size: 15px"
                class=" badge badge-success">เห็นควรอนุมัติ</span>';
            else :
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-danger">ไม่เห็นควรอนุมัติ</span>';
            endif;

            $row[] = $rows->remark_gm;
            $hr_no = $rows->hr_no . '/' . $rows->year;
            if ($rows->status_gm == 0) :
                $row[] = '
            <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="สำหรับหน่วยงานที่ขอ" onclick="form_requested_gm(' . "'" . $hr_no . "'" . ')">ทำการอนุมัติ</a>
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
            "recordsTotal" => $this->tbl_req_m->count_all(),
            "recordsFiltered" => $this->tbl_req_m->count_filtered_gm(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
