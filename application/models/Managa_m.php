<?php
class Managa_m extends CI_Model
{
    public $account = 'account';
    public $account_of_role = 'account_of_role';
    public $account_role = 'account_role';
    public $organ_chart = 'organ_chart';
    public $app_manp_form = 'app_manp_form';
    public $manpower_form = 'manpower_form';

    public $column_order = array('code', 'salutation', 'firstname_th', 'lastname_th', 'position', 'department_code', 'department_title', null); //set column field database for datatable orderable
    public $column_search = array('code', 'salutation', 'firstname_th', 'lastname_th', 'position', 'department_code', 'department_title'); //set column field database for datatable searchable just code', 'salutation', 'firstname_th', 'lastname_th', 'department_code', 'department_title' are searchable
    public $order = array('code' => 'DESC'); //

    public $replace_emp = 'replace_emp';
    public $bizplan_emp = 'bizplan_emp';
    public $column_order2 = array('year', 'cost_cen', 'cost_cen_posi', null); //set column field database for datatable orderable
    public $column_search2 = array('year', 'cost_cen', 'cost_cen_posi'); //set column field database for datatable searchable just code', 'salutation', 'firstname_th', 'lastname_th', 'department_code', 'department_title' are searchable
    public $order_bizplan = array('biz_id' => 'DESC'); //
    public $order_replace = array('repl_id' => 'DESC'); //

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('account_id, code, salutation, firstname_th, lastname_th, position, department_code, department_title, removed');
        $this->db->from($this->account);
        $this->db->where('role', 'EMPLOYEE');
        $this->db->where('removed', 0);
        $i = 0;
        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }
                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        // $this->db->where('account_id', $account_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->account);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query_biz()
    {
        //add custom filter here

        $this->db->from($this->bizplan_emp);

        $i = 0;

        foreach ($this->column_search2 as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search2) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }
                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_bizplan)) {
            $order = $this->order_bizplan;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_biz()
    {
        $this->_get_datatables_query_biz();
        // $this->db->where('account_id', $account_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_biz()
    {
        $this->_get_datatables_query_biz();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_biz()
    {
        $this->db->from($this->account);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query_replace()
    {

        $this->db->from($this->replace_emp);

        $i = 0;
        foreach ($this->column_search2 as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search2) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }
                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_replace)) {
            $order = $this->order_replace;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_replace()
    {
        $this->_get_datatables_query_replace();
        // $this->db->where('account_id', $account_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_replace()
    {
        $this->_get_datatables_query_replace();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_replace()
    {
        $this->db->from($this->account);
        return $this->db->count_all_results();
    }

    public function add_bizplan($data)
    {
        $this->db->insert($this->bizplan_emp, $data);
        return $this->db->insert_id();
    }

    public function update_bizplan($where, $data)
    {
        $this->db->update($this->bizplan_emp, $data, $where);
        return $this->db->affected_rows();
    }

    public function view_bizplan_by_id($biz_id)
    {

        $this->db->from($this->bizplan_emp);
        $this->db->where('biz_id', $biz_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function remove_bizplan($biz_id)
    {
        $this->db->where("biz_id", $biz_id);
        $this->db->delete($this->bizplan_emp);
    }
    
    public function add_replace($data)
    {
        $this->db->insert($this->replace_emp, $data);
        return $this->db->insert_id();
    }

    public function update_replace($where, $data)
    {
        $this->db->update($this->replace_emp, $data, $where);
        return $this->db->affected_rows();
    }
    public function view_replace_by_id($repl_id)
    {
        $this->db->from($this->replace_emp);
        $this->db->where('repl_id', $repl_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function remove_replace($repl_id)
    {
        $this->db->where("repl_id", $repl_id);
        $this->db->delete($this->replace_emp);
    }

    
}