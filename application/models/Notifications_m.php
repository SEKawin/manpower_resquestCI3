<?php defined('BASEPATH') or exit('No direct script access allowed');
class Notifications_m extends CI_Model
{
    public $account = 'account';
    public $manpower_form = 'manpower_form';
    public $app_manp_form = 'app_manp_form';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function notify_mgr($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.dept_mgr_code', $code);
        $this->db->where('app_manp_form.status_dept_mgr', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function notify_agm($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.agm_code', $code);
        $this->db->where('app_manp_form.status_agm', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function notify_gm($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.gm_code', $code);
        $this->db->where('app_manp_form.status_gm', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function notify_hr($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.hr_code', $code);
        $this->db->where('app_manp_form.status_hr', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function notify_hrm_mgr($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.hrm_mgr_code', $code);
        $this->db->where('app_manp_form.status_hrm_mgr', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function notify_hrm_agm($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.hrm_agm_code', $code);
        $this->db->where('app_manp_form.status_hrm_agm', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function notify_od($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.od_code', $code);
        // $this->db->where('app_manp_form.status_od', 0);
        $this->db->where('app_manp_form.status_od is null');

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function notify_evp($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.evp_code', $code);
        $this->db->where('app_manp_form.status_evp', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function notify_svp($code)
    {
        $this->db->from($this->app_manp_form);
        $this->db->where('app_manp_form.svp_code', $code);
        $this->db->where('app_manp_form.status_svp', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
