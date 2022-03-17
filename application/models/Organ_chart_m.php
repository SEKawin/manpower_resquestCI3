<?php defined('BASEPATH') or exit('No direct script access allowed');
class Organ_chart_m extends CI_Model
{
    public $organ_chart = 'organ_chart';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function add_manager_organ($data)
    {
        $this->db->insert($this->organ_chart, $data);
        return $this->db->insert_id();
    }

    public function edit_manager_organ($id)
    {
        $this->db->from($this->organ_chart);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_manger_organ($where, $data)
    {
        $this->db->update($this->organ_chart, $data, $where);
        return $this->db->affected_rows();
    }

    public function remove_manager_organ($id){

    }
}
