<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Tbl_manage_c extends CI_Controller
{

    public $PAGE;

    public function __construct()
    {
        parent::__construct();

        // Load Pagination library
        $this->load->library('pagination');

        // Load database
        $this->load->model('managa_m', 'managa_m');
        $this->load->model('account_model', 'account_m');
    }
    public function ajax_user()
    {
        $list = $this->managa_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rows) {
            $no++;
            $row = array();
            $row[] = $rows->code;
            $row[] = $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th;
            $row[] = $rows->position;
            $row[] = $rows->department_code . ' ' . $rows->department_title;
            if ($rows->removed == '0') {
                $row[] = '<spen class ="text-success"> ใช้งาน </spen>';
            } else {
                $row[] = '<spen class ="text-success"> ลาออก </spen>';
            }
            $row[] = '
                    <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit Account"
                    onclick="edit_account(' . "'" . $rows->code . "'" . ')">
                    <i class="fa fa-pencil-square-o"></i> ปรับปรุง</a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Remove Account"
                    onclick="delete_account(' . "'" . $rows->code . "'" . ')">
                    <i class="fa fa-trash-o"></i></i> นำออก</a> </td>
                    ';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->managa_m->count_all(),
            "recordsFiltered" => $this->managa_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_bizplan()
    {
        $list = $this->managa_m->get_datatables_biz();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rows) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->year;
            $row[] = $rows->cost_cen;
            $row[] = $rows->cost_cen_posi;
            $row[] = $rows->level;
            $row[] = $rows->name_of_posi;
            $row[] = $rows->required_amount;
            $row[] = $rows->required_amount - $rows->remaining_amount;
            $row[] = '
                    <div class="btn-group btn-group-toggle">
                        <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="แก้ไข" onclick="edit_bizplan(' . "'" . $rows->biz_id . "'" . ')">แก้ไข</a>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="ลบข้อมูล" onclick="remove_bizplan(' . "'" . $rows->biz_id . "'" . ')">ยกเลิก</a>
                    </div>
                        ';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->managa_m->count_all_biz(),
            "recordsFiltered" => $this->managa_m->count_filtered_biz(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_replace()
    {
        $list = $this->managa_m->get_datatables_replace();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rows) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rows->year;
            $row[] = $rows->cost_cen;
            $row[] = $rows->cost_cen_posi;
            $row[] = $rows->position_replace;
            $row[] = $rows->name_replace;
            $row[] = $rows->required_amount;
            $row[] = $rows->required_amount - $rows->remaining_amount;
            $row[] = '<a href="' . base_url('/uploads/resignation_attach/' . $rows->resignation_attach) . '" download="ใบลาออกของพนักงาน" class="btn btn-danger btn-sm " tabindex="-1" role="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>&nbsp;';
            
            $row[] = '
                    <div class="btn-group btn-group-toggle">
                        <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="แก้ไข" onclick="edit_replace(' . "'" . $rows->repl_id . "'" . ')">แก้ไข</a>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="ลบข้อมูล" onclick="remove_replace(' . "'" . $rows->repl_id . "'" . ')">ยกเลิก</a>
                    </div>
            ';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->managa_m->count_all_replace(),
            "recordsFiltered" => $this->managa_m->count_filtered_replace(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
