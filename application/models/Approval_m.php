<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_m extends CI_Model
{
    public $manpower_form = 'manpower_form';
    public $app_manp_form = 'app_manp_form';
    public $account = 'account';
    public $account_of_role = 'account_of_role';
    public $account_role = 'account_role';
    public $organ_chart = 'organ_chart';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_organ_chart($code)
    {
        $this->db->where('deptmgr_code', $code);
        $query = $this->db->get($this->organ_chart);
        return $query->result();
    }

    public function get_organ_chart_2($code)
    {
        $this->db->where('agm_code', $code);
        $query = $this->db->get($this->organ_chart);
        return $query->result();
    }

    public function check_stauts($form_hr_no)
    {
        $this->db->where('form_hr_no', $form_hr_no);
        $query = $this->db->get($this->app_manp_form);
        return $query->result();
    }
    
   public function approval_mgr_1($data, $agm_code, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_mgr = $data['status_dept_mgr'];
        $remark = $data['remark_dept_mgr'];

        $this->db->set('status_dept_mgr', $status_mgr);
        $this->db->set('remark_mgr', $remark);
        $this->db->set('update_mgr', 'NOW()', FALSE);
        $this->db->set('agm_code', $agm_code);
        $this->db->set('status_agm', $status);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function approval_mgr_2($data, $agm_code, $gm_code, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_mgr = $data['status_dept_mgr'];
        $remark = $data['remark_dept_mgr'];

        $this->db->set('status_dept_mgr', $status_mgr);
        $this->db->set('remark_mgr', $remark);
        $this->db->set('update_mgr', 'NOW()', FALSE);
        $this->db->set('agm_code', $agm_code);
        $this->db->set('gm_code', $gm_code);
        $this->db->set('status_gm', $status);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function disapproval_mgr($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_mgr = $data['status_dept_mgr'];
        $remark = $data['remark_dept_mgr'];

        $this->db->set('status_form', $status_mgr);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function approval_agm($data, $gm_code, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_agm = $data['status_agm'];
        $remark = $data['remark_agm'];

        $this->db->set('status_agm', $status_agm);
        $this->db->set('remark_agm', $remark);
        $this->db->set('update_agm', 'NOW()', FALSE);
        $this->db->set('gm_code', $gm_code);
        $this->db->set('status_gm', $status);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function disapproval_agm($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_agm = $data['status_agm'];
        $remark = $data['remark_agm'];

        $this->db->set('status_form', $status_agm);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function set_approval($name_role)
    {
        $this->db->select('hr_account.code, hr_account_role.name_role');
        $this->db->from('account');
        $this->db->join('account_of_role', 'account_of_role.account_code = account.code', 'LEFT');
        $this->db->join('account_role', 'account_role.id = account_of_role.role_id', 'LEFT');
        $this->db->where('account_role.name_role', $name_role);
        $query = $this->db->get();
        return $query->result();
    }

    public function approval_gm($data, $hr_code, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_gm = $data['status_gm'];
        $remark = $data['remark_gm'];

        $this->db->set('status_gm', $status_gm);
        $this->db->set('remark_gm', $remark);
        $this->db->set('update_gm', 'NOW()', FALSE);
        $this->db->set('hr_code', $hr_code);
        $this->db->set('status_hr', $status);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function disapproval_gm($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_gm = $data['status_gm'];
        $remark = $data['remark_gm'];

        $this->db->set('status_form', $status_gm);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function approval_hr($data, $hrm_mgr_code, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_hr = $data['status_hr'];
        $remark = $data['remark_hr'];

        $this->db->set('status_hr', $status_hr);
        $this->db->set('remark_hr', $remark);
        $this->db->set('update_hr', 'NOW()', FALSE);
        $this->db->set('hrm_mgr_code', $hrm_mgr_code);
        $this->db->set('status_hrm_mgr', $status);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function disapproval_hr($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_hr = $data['status_hr'];
        $remark = $data['remark_hr'];

        $this->db->set('status_form', $status_hr);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function approval_hrm_mgr($data, $hrm_agm_code, $hr_gm_code, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_hrm_mgr = $data['status_hrm_mgr'];
        $remark = $data['remark_hrm_mgr'];

        $this->db->set('status_hrm_mgr', $status_hrm_mgr);
        $this->db->set('remark_hrm_mgr', $remark);
        $this->db->set('update_hrm_mgr', 'NOW()', FALSE);
        $this->db->set('hrm_agm_code', $hrm_agm_code);
        $this->db->set('status_hrm_agm', $status);

        $this->db->set('od_code', $hr_gm_code);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function disapproval_hrm_mgr($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_hrm_mgr = $data['status_hrm_mgr'];
        $remark = $data['remark_hrm_mgr'];

        $this->db->set('status_form', $status_hrm_mgr);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function approval_hrm_agm($data, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_hrm_agm = $data['status_hrm_agm'];
        $remark = $data['remark_hrm_agm'];

        $this->db->set('status_hrm_agm', $status_hrm_agm);
        $this->db->set('remark_hrm_agm', $remark);
        $this->db->set('status_od', $status);
        $this->db->set('update_hrm_agm', 'NOW()', FALSE);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function disapproval_hrm_agm($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_hrm_agm = $data['status_hrm_agm'];
        $remark = $data['remark_hrm_agm'];

        $this->db->set('status_form', $status_hrm_agm);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function approval_hrm_gm($data, $evp_code, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_od = $data['status_od'];
        $remark = $data['remark_od'];

        $this->db->set('status_od', $status_od);
        $this->db->set('remark_od', $remark);
        $this->db->set('update_od', 'NOW()', FALSE);
        $this->db->set('evp_code', $evp_code);
        $this->db->set('status_evp', $status);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function disapproval_hrm_gm($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_od = $data['status_od'];
        $remark = $data['remark_od'];

        $this->db->set('status_form', $status_od);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function approval_evp($data, $svp_code, $status)
    {
        $form_hr_no = $data['hr_no'];
        $status_evp = $data['status_evp'];
        $remark = $data['remark_evp'];

        $this->db->set('status_evp', $status_evp);
        $this->db->set('remark_evp', $remark);
        $this->db->set('update_evp', 'NOW()', FALSE);
        $this->db->set('svp_code', $svp_code);
        $this->db->set('status_svp', $status);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function disapproval_evp($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_evp = $data['status_evp'];
        $remark = $data['remark_evp'];

        $this->db->set('status_form', $status_evp);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function update_status_evp($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_evp = $data['status_evp'];
        $remark = $data['remark_evp'];

        $this->db->set('status_form', $status_evp);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }

    public function approval_svp($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_svp = $data['status_svp'];
        $remark = $data['remark_svp'];

        $this->db->set('status_svp', $status_svp);
        $this->db->set('remark_svp', $remark);
        $this->db->set('update_svp', 'NOW()', FALSE);
        $this->db->where('form_hr_no', $form_hr_no);
        $this->db->update($this->app_manp_form);
        return $this->db->affected_rows();
    }

    public function update_status_svp($data)
    {
        $form_hr_no = $data['hr_no'];
        $status_svp = $data['status_svp'];
        $remark = $data['remark_evp'];

        $this->db->set('status_form', $status_svp);
        $this->db->set('remark_form', $remark);
        $this->db->set('update_status_form', 'NOW()', FALSE);
        $this->db->where('hr_no', $form_hr_no);
        $this->db->update($this->manpower_form);
        return $this->db->affected_rows();
    }
}
