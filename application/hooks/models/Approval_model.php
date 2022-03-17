<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_model extends CI_Model
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

    public function save_appr_manager($appr_acc_id, $training_form_id)
    {
        $this->db->set('appr_acc_id', $appr_acc_id);
        $this->db->set('acc_tra_id', $training_form_id);
        $this->db->set('level', 1);
        $this->db->insert($this->approval_form);
    }

    public function chk_tra_by_appr($account_id,$acc_tra_id,$approval)
    {
       
        $this->db->set('acc_tra_id', $acc_tra_id);
        $this->db->set('appr_acc_id', $account_id);
        $this->db->insert($this->check_training,$approval);
        $query = $this->db->insert_id();
        return $query;

    }

    public function update_appr_by_hrd($account_id, $acc_tra_id, $level, $approval)
    {
        // print_r($account_id.' '.$acc_tra_id);
        $status_appr = $approval['status_appr'];
        $remark = $approval['remark'];
        
        $this->db->set('status_appr', $status_appr);
        $this->db->set('remark', $remark);
        $this->db->where('appr_acc_id', $account_id);
        $this->db->where('acc_tra_id', $acc_tra_id);
        $this->db->where('level', $level);
        $this->db->update($this->approval_form);
        $query = $this->db->insert_id();
        return $query;
    }

    public function update_approval_form($account_id, $status_appr, $acc_tra_id, $level, $remark)
    {
        // print_r($account_id . ' ' . $status_appr . ' ' . $acc_tra_id.' '.$remark);
        // die;
        $this->db->set('status_appr', $status_appr);
        $this->db->set('remark', $remark);
        $this->db->where('acc_tra_id', $acc_tra_id);
        $this->db->where('level', $level);
        $this->db->where('appr_acc_id', $account_id);
        $this->db->update($this->approval_form);
    }

    public function save_next_appr($appr_acc_id, $acc_tra_id, $level)
    {

        $this->db->set('appr_acc_id', $appr_acc_id);
        $this->db->set('acc_tra_id', $acc_tra_id);
        $this->db->set('level', $level);
        $this->db->insert($this->approval_form);
        $query = $this->db->insert_id();
        return $query;
    }

    public function get_tbl_approval($account_id, $training_form_id)
    {
        $this->db->select('approval_form.appr_acc_id as acc_id, approval_form.acc_tra_id as tra_id, approval_form.level as level');
        $this->db->from($this->approval_form);
        $this->db->join($this->check_training, 'check_training.acc_tra_id = approval_form.acc_tra_id', 'LEFT');
        $this->db->join($this->account_has_pt_training_form, 'account_has_pt_training_form.pt_training_form_id = approval_form.acc_tra_id', 'LEFT');
        $this->db->where('approval_form.appr_acc_id', $account_id);
        $this->db->like('approval_form.acc_tra_id', $training_form_id);
        // $this->db->group_by('approval_form.appr_acc_id',);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_check_training($acc_tra_id)
    {
        $this->db->where('acc_tra_id', $acc_tra_id);
        $query = $this->db->get($this->check_training);
        return $query->result();

    }
}