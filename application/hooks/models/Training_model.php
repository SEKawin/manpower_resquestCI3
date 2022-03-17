<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Training_model extends CI_Model
{
    public $training_form = 'training_form';
    public $account = 'account';
    public $account_has_pt_training_form = 'account_has_pt_training_form';
    public $account_has_pt_account_role = 'account_has_pt_account_role';
    public $account_role = 'account_role';
    public $approval_form = 'approval_form';
    public $check_training = 'check_training';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_role($account_id)
    {
        $this->db->from($this->account);
        $this->db->join($this->account_has_pt_account_role, 'pt_account_has_pt_account_role.pt_account_id = pt_account.account_id', 'LEFT');
        $this->db->join($this->account_role, 'pt_account_role.id = pt_account_has_pt_account_role.pt_account_role_id', 'LEFT');
        // $this->db->join($this->approval_form, 'approval_form.appr_acc_id = account.account_id', 'LEFT');
        $this->db->where('account.account_id', $account_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_role_appr($account_id)
    {
        $this->db->from($this->account);
        $this->db->join($this->account_has_pt_account_role, 'pt_account_has_pt_account_role.pt_account_id = pt_account.account_id', 'LEFT');
        $this->db->join($this->account_role, 'pt_account_role.id = pt_account_has_pt_account_role.pt_account_role_id', 'LEFT');
        $this->db->join($this->approval_form, 'approval_form.appr_acc_id = account.account_id', 'LEFT');
        $this->db->where('account.account_id', $account_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_home_tra_by_emp($account_id)
    {
        $this->db->from($this->account_has_pt_training_form);
        $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id', 'LEFT');
        $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id', 'LEFT');
        $this->db->join($this->account_has_pt_account_role, 'account.account_id = account_has_pt_account_role.pt_account_id', 'LEFT');
        $this->db->join($this->account_role, 'account_role.id = account_has_pt_account_role.pt_account_role_id', 'LEFT');
        $this->db->where('account_has_pt_training_form.pt_account_id', $account_id);
        $this->db->where('pt_training_form.removed', 0);
        $this->db->order_by('created_on', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_home_tra_by_mgr($account_id)
    {
        $name_role = $this->session->userdata('name_role');

        $this->db->from($this->account_has_pt_training_form);
        $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id', 'LEFT');
        $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id', 'LEFT');
        $this->db->join($this->approval_form, 'approval_form.acc_tra_id = account_has_pt_training_form.acc_tra_id', 'LEFT');
        $this->db->where('approval_form.appr_acc_id', $account_id);
        $this->db->where('approval_form.level', 1);
        $this->db->where('pt_training_form.removed', 0);
        $this->db->order_by('created_on', 'DESC');
        // $this->db->group_by('acc_tra_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_home_tra_by_hrd($account_id)
    {
        $name_role = $this->session->userdata('name_role');

        $this->db->from($this->account_has_pt_training_form);
        $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id', 'LEFT');
        $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id', 'LEFT');
        $this->db->join($this->approval_form, 'approval_form.acc_tra_id = account_has_pt_training_form.acc_tra_id', 'LEFT');
        $this->db->where('approval_form.appr_acc_id', $account_id);
        if ($account_id == '366') {
            $this->db->where('approval_form.level', 2);
        } else {
            $this->db->where('approval_form.level', 3);
        }
        $this->db->where('pt_training_form.removed', 0);
        $this->db->order_by('created_on', 'DESC');
        // $this->db->group_by('acc_tra_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_home_tra_by_hrd_mgr($account_id)
    {
        $name_role = $this->session->userdata('name_role');

        $this->db->from($this->account_has_pt_training_form);
        $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id', 'LEFT');
        $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id', 'LEFT');
        $this->db->join($this->approval_form, 'approval_form.acc_tra_id = account_has_pt_training_form.acc_tra_id', 'LEFT');
        $this->db->where('approval_form.appr_acc_id', $account_id);
        $this->db->where('approval_form.level', 4);

        $this->db->where('pt_training_form.removed', 0);
        $this->db->order_by('created_on', 'DESC');
        // $this->db->group_by('acc_tra_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_home_tra_by_od($account_id)
    {
        $name_role = $this->session->userdata('name_role');

        $this->db->from($this->account_has_pt_training_form);
        $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id', 'LEFT');
        $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id', 'LEFT');
        $this->db->join($this->approval_form, 'approval_form.acc_tra_id = account_has_pt_training_form.acc_tra_id', 'LEFT');
        $this->db->where('approval_form.appr_acc_id', $account_id);
        $this->db->where('approval_form.level', 5);

        $this->db->where('pt_training_form.removed', 0);
        $this->db->order_by('created_on', 'DESC');
        // $this->db->group_by('acc_tra_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_home_tra_by_evp($account_id)
    {
        $name_role = $this->session->userdata('name_role');

        $this->db->from($this->account_has_pt_training_form);
        $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id', 'LEFT');
        $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id', 'LEFT');
        $this->db->join($this->approval_form, 'approval_form.acc_tra_id = account_has_pt_training_form.acc_tra_id', 'LEFT');
        $this->db->where('approval_form.appr_acc_id', $account_id);
        $this->db->where('approval_form.level', 6);

        $this->db->where('pt_training_form.removed', 0);
        $this->db->order_by('created_on', 'DESC');
        // $this->db->group_by('acc_tra_id');
        $query = $this->db->get();
        return $query->result();
    }

    //fetch manage
    public function get_training_form()
    {
        $account_id = $this->session->userdata('account_id');
        $role = $this->session->userdata('role');
        // print_r($account_id.' '.$role);

        if ($role == 'EMPLOYEE') {
            $this->db->from($this->account_has_pt_training_form);
            $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id');
            $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id');
            $this->db->where('account_has_pt_training_form.pt_account_id', $account_id);
            $this->db->where('account.role', $role);
            $this->db->where('pt_training_form.removed', 0);
            $this->db->order_by('created_on', 'DESC');
            $query = $this->db->get();
        } else {
            $this->db->from($this->account_has_pt_training_form);
            $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id');
            $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id');
            $this->db->where('pt_training_form.removed', 0);
            $this->db->order_by('created_on', 'DESC');
            $query = $this->db->get();
        }
        return $query->result();
    }

    public function save_training_form($data)
    {
        $this->db->insert($this->training_form,$data);
        return $this->db->insert_id();
    }

    public function save_acc_training_form($account_id, $training_form_id)
    {
        $this->db->set('pt_account_id', $account_id);
        $this->db->set('pt_training_form_id', $training_form_id);
        $this->db->insert($this->account_has_pt_training_form);
    }

    public function get_tra_by_id_view($training_form_id)
    {
        $this->db->from($this->training_form);
        $this->db->join($this->account_has_pt_training_form, 'account_has_pt_training_form.pt_training_form_id = training_form.training_form_id', 'left');
        $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id', 'LEFT');
        $this->db->join($this->check_training, 'check_training.acc_tra_id = account_has_pt_training_form.acc_tra_id', 'LEFT');
        $this->db->join($this->approval_form, 'approval_form.acc_tra_id = account_has_pt_training_form.acc_tra_id', 'LEFT');
        $this->db->where('training_form.training_form_id', $training_form_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function cancel_tra_form($training_form_id)
    {
        $this->db->set('removed', '1');
        $this->db->where('training_form_id', $training_form_id);
        $this->db->update($this->training_form);
    }

    public function get_chk_tra_by_id($acc_tra_id)
    {
        // $this->db->select('count(*)');
        $this->db->from($this->approval_form);
        $this->db->join($this->account_has_pt_training_form, 'account_has_pt_training_form.acc_tra_id = approval_form.acc_tra_id');
        $this->db->join($this->training_form, 'training_form.training_form_id = account_has_pt_training_form.pt_training_form_id');
        $this->db->join($this->account, 'account.account_id = account_has_pt_training_form.pt_account_id');
        $this->db->where('approval_form.acc_tra_id', $acc_tra_id);
        $query = $this->db->get();
        return $query->result();
    }

}