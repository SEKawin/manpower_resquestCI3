<?php defined('BASEPATH') or exit('No direct script access allowed');
class manpower_form_m extends CI_Model
{
    public $manpower_form = 'manpower_form';
    public $app_manp_form = 'app_manp_form';
    public $account = 'account';
    public $account_of_role = 'account_of_role';
    public $account_role = 'account_role';
    public $organ_chart = 'organ_chart';

    public $bizplan_emp = 'bizplan_emp';
    public $replace_emp = 'replace_emp';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ajax_add_manpower_form($data)
    {
        $this->db->insert($this->manpower_form, $data);
        return $this->db->insert_id();
    }

    public function approval_by_mgr($form_id, $hr_no, $year, $code)
    {
        $this->db->set('form_id', $form_id);
        $this->db->set('form_hr_no', $hr_no);
        $this->db->set('form_year', $year);
        $this->db->set('dept_mgr_code', $code);
        $this->db->set('status_dept_mgr', 0);
        $this->db->set('update_mgr', 'NOW()', FALSE);
        $this->db->insert($this->app_manp_form);
    }

    public function ajax_add_form_agian($hr_no, $year, $form_data)
    {
        $this->db->set('duty_resp', $form_data['duty_resp']);
        $this->db->set('sex_emp', $form_data['sex_emp']);
        $this->db->set('age_emp', $form_data['age_emp']);
        $this->db->set('education_emp', $form_data['education_emp']);
        $this->db->set('skill_expert', $form_data['skill_expert']);
        $this->db->set('experience', $form_data['experience']);
        $this->db->set('other', $form_data['other']);
        $this->db->set('status_form', '1');
        $this->db->set('remark_form', '');
        $this->db->where('hr_no', $hr_no);
        $this->db->where('year', $year);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function approval_by_mgr_agian($hr_no, $year, $mgr_code)
    {
        $this->db->set('dept_mgr_code', $mgr_code);
        $this->db->set('status_dept_mgr', 0);
        $this->db->set('update_mgr', 'NOW()', FALSE);
        $this->db->where('form_hr_no', $hr_no);
        $this->db->where('form_year', $year);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function get_view_manp_form($hr_no, $year)
    {
        $this->db->from($this->manpower_form);
        $this->db->join($this->account, 'account.code = manpower_form.create_by', 'LEFT');
        $this->db->join($this->app_manp_form, 'app_manp_form.form_hr_no = manpower_form.hr_no', 'LEFT');
        $this->db->where('manpower_form.hr_no', $hr_no);
        $this->db->where('manpower_form.year', $year);
        $this->db->where('app_manp_form.form_hr_no', $hr_no);
        $this->db->where('app_manp_form.form_year', $year);

        $query = $this->db->get();
        return $query->result();
    }

    public function check_number()
    {
        $this->db->select('hr_no,year');
        $this->db->from($this->manpower_form);
        $this->db->order_by('hr_no', 'DESC');
        $this->db->order_by('year', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_bizplan($department_code)
    {
        $this->db->from($this->bizplan_emp);
        $this->db->where('cost_cen', $department_code);
        $this->db->where('required_amount != remaining_amount');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_replace($department_code)
    {
        $this->db->from($this->replace_emp);
        $this->db->where('cost_cen', $department_code);
        $this->db->where('required_amount != remaining_amount');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_bizplan_id($biz_id)
    {
        $this->db->from($this->bizplan_emp);
        $this->db->where('biz_id', $biz_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_replace_id($repl_id)
    {
        $this->db->from($this->replace_emp);
        $this->db->where('repl_id', $repl_id);
        $query = $this->db->get();
        return $query->result();
    }
}
