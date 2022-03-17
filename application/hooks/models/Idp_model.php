<?php
class Idp_model extends CI_Model
{
    public $idp_form = 'idp_form';
    public $account = 'account';
    public $account_role = 'account_role';
    public $account_has_pt_account_role = 'account_has_pt_account_role';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }

    public function get_idp_by_dept($account_id, $dept_code, $office_code, $role)
    {
        if ($role === 'HRD' || $role === 'MANAGER') {
            $this->db->from($this->account);
            $this->db->join($this->idp_form, 'idp_form.pt_account_id = account.account_id', 'LEFT');
            $this->db->join($this->account_has_pt_account_role, 'account_has_pt_account_role.pt_account_id = account.account_id', 'LEFT');
            $this->db->join($this->account_role, 'account_role.id = account_has_pt_account_role.pt_account_role_id', 'LEFT');
            $this->db->where('account.removed', 0);
            $this->db->where('account.office_code', $office_code);
            $this->db->where('account.department_code', $dept_code);
            $this->db->group_by('account.code');
            $this->db->order_by('code', 'ASC');
            $query = $this->db->get();

        } else {
            $this->db->from($this->account);
            $this->db->join($this->idp_form, 'idp_form.pt_account_id = account.account_id', 'LEFT');
            $this->db->join($this->account_has_pt_account_role, 'account_has_pt_account_role.pt_account_id = account.account_id', 'LEFT');
            $this->db->join($this->account_role, 'account_role.id = account_has_pt_account_role.pt_account_role_id', 'LEFT');
            $this->db->where('account.removed', 0);
            $this->db->where('account.office_code', $office_code);
            $this->db->where('account.department_code', $dept_code);
            $this->db->where('account.account_id', $account_id);
            $this->db->group_by('account.code');
            $this->db->order_by('code', 'ASC');
            $query = $this->db->get();
        }

        return $query->result();
    }

    
    public function save_file_idp($data, $account_id)
    {
        $this->db->where('pt_account_id', $account_id);
        $this->db->insert($this->idp_form, $data);
        return $this->db->affected_rows();
    }

    public function save_new_file_idp($data){
        $this->db->set('pt_account_id', $account_id);
        $this->db->insert($this->idp_form, $data);
        return $this->db->affected_rows();
    }

    public function get_account_id($code)
    {
        $this->db->where('code', $code);
        $query = $this->db->get($this->account);
        return $query->result();
    }
    public function get_idp_by_code($account_id){

        $this->db->where('pt_account_id',$account_id);
        $query = $this->db->get($this->idp_form);
        return $query->result();
    }
}