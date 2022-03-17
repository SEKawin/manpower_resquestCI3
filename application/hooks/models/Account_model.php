<?php
class Account_model extends CI_Model
{
    public $account = 'account';
    public $account_has_pt_account_role = 'account_has_pt_account_role';
    public $account_role = 'account_role';
    public $approval_form = 'approval_form';

    public $column_order = array('code', 'salutation', 'firstname_th', 'lastname_th', 'position', 'department_code', 'department_title', null); //set column field database for datatable orderable
    public $column_search = array('code', 'salutation', 'firstname_th', 'lastname_th', 'position', 'department_code', 'department_title'); //set column field database for datatable searchable just code', 'salutation', 'firstname_th', 'lastname_th', 'department_code', 'department_title' are searchable
    public $order = array('code' => 'DESC'); // default order

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function validate_login_db($username, $password)
    {
        $username = $this->security->xss_clean($username);
        $password = $this->security->xss_clean($password);

        $this->db->from($this->account);
        $this->db->join($this->account_has_pt_account_role, 'pt_account_has_pt_account_role.pt_account_id = pt_account.account_id', 'LEFT');
        $this->db->join($this->account_role, 'pt_account_role.id = pt_account_has_pt_account_role.pt_account_role_id', 'LEFT');
        $this->db->join($this->approval_form, 'approval_form.appr_acc_id = account.account_id', 'LEFT');
        $this->db->where('pt_account.username', $username);
        $this->db->where('pt_account.password', $password);
        $query = $this->db->get();
        return $query;
    }

    public function validate_login($username, $password)
    {
        $username = $this->security->xss_clean($username);
        $password = $this->security->xss_clean($password);

        $this->db->where('pt_account.username', $username);
        $this->db->where('pt_account.password', $password);
        $query = $this->db->get($this->account, 1);
        return $query;
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

    public function get_by_id($account_id)
    {
        $this->db->from($this->account);
        $this->db->where('account_id', $account_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save_account($data)
    {
        $this->db->insert($this->account, $data);
        return $this->db->insert_id();
    }

    public function update_account($where, $data)
    {
        $finish = $this->db->update($this->account, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_all_account($code, $username, $password)
    {
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->where('code', $code);
        // $this->db->where('username',NULL);
        $finish = $this->db->update($this->account);

        return $this->db->affected_rows();
    }

    public function remove_by_id($account_id)
    {
        // $this->db->set('resign', '0');
        $this->db->set('removed', '1');
        $this->db->set('password', null);
        $this->db->where('account_id', $account_id);
        $this->db->update($this->account);
    }

    public function get_approver()
    {
        $this->db->from($this->account);
        $this->db->join($this->account_has_pt_account_role, 'pt_account.account_id = pt_account_has_pt_account_role.pt_account_id', 'LEFT');
        $this->db->join($this->account_role, 'pt_account_role.id = pt_account_has_pt_account_role.pt_account_role_id', 'LEFT');
        $this->db->where('pt_account_role.name_role', 'MANAGER');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_hrd()
    {
        $this->db->from($this->account);
        $this->db->join($this->account_has_pt_account_role, 'pt_account.account_id = pt_account_has_pt_account_role.pt_account_id', 'INNER');
        $this->db->join($this->account_role, 'pt_account_role.id = pt_account_has_pt_account_role.pt_account_role_id', 'INNER');
        $this->db->where('pt_account_role.name_role', 'HRD');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_hrd_manager()
    {
        $this->db->from($this->account);
        $this->db->join($this->account_has_pt_account_role, 'pt_account.account_id = pt_account_has_pt_account_role.pt_account_id', 'INNER');
        $this->db->join($this->account_role, 'pt_account_role.id = pt_account_has_pt_account_role.pt_account_role_id', 'INNER');
        $this->db->where('pt_account_role.name_role', 'OD');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_account()
    {
        $query = $this->db->where('role','EMPLOYEE');
        $query = $this->db->get($this->account);
        return $query->result();
    }

    public function get_appr_by_office()
    {
        $where = "pt_account_role.name_role = 'MANAGER'
        OR pt_account_role.name_role = 'OD'
        OR pt_account_role.name_role = 'HRD_MANAGER'";

        $this->db->select('account_id,code,firstname_th,lastname_th,department_code,department_title');
        $this->db->from($this->account);
        $this->db->join($this->account_has_pt_account_role, 'pt_account.account_id = pt_account_has_pt_account_role.pt_account_id', 'LEFT');
        $this->db->join($this->account_role, 'pt_account_role.id = pt_account_has_pt_account_role.pt_account_role_id', 'LEFT');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function list_office()
    {
        $this->db->select('office_code,office_title');
        $this->db->from($this->account);
        $this->db->group_by('office_code,office_title');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_department()
    {
        $this->db->select('department_code,department_title');
        $this->db->from($this->account);
        $this->db->group_by('department_code,department_title');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_division()
    {
        $this->db->select('division_code,division_title');
        $this->db->from($this->account);
        $this->db->group_by('division_code,division_title');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_section()
    {
        $this->db->select('section_code,section_title');
        $this->db->from($this->account);
        $this->db->group_by('section_code,section_title');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_appr(){
        $where = "pt_account_role.name_role = 'MANAGER'
        OR pt_account_role.name_role = 'OD'
        OR pt_account_role.name_role = 'HRD'
        OR pt_account_role.name_role = 'HRD_MANAGER'";

        $this->db->select('account_id');
        $this->db->from($this->account);
        $this->db->join($this->account_has_pt_account_role, 'pt_account.account_id = pt_account_has_pt_account_role.pt_account_id', 'LEFT');
        $this->db->join($this->account_role, 'pt_account_role.id = pt_account_has_pt_account_role.pt_account_role_id', 'LEFT');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}