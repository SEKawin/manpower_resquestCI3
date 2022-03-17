<?php
class tbl_req_m extends CI_Model
{
    public $account = 'account';
    public $account_of_role = 'account_of_role';
    public $account_role = 'account_role';
    public $organ_chart = 'organ_chart';
    public $app_manp_form = 'app_manp_form';
    public $manpower_form = 'manpower_form';
    public $column_order = array(null,'hr_no', 'req_posi_name', 'cost_center', 'rec_date'); //set column field database for datatable orderable
    public $column_search = array('hr_no','req_posi_name', 'cost_center', 'rec_date'); //set column field database for datatable searchable
    // public $order = array('code' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }

    private function _get_datatables_query_mgr()
    {
        $code = $this->session->userdata('code');
        $name_role = $this->session->userdata('name_role');

        //add report filter here
        if ($this->input->post('req_posi_name')) :
            $this->db->like('req_posi_name', $this->input->post('req_posi_name'));
        endif;
        if ($this->input->post('rec_date')) :
            $this->db->like('rec_date', $this->input->post('rec_date'));
        endif;
        if ($this->input->post('cost_center')) :
            $this->db->like('cost_center', $this->input->post('cost_center'));
        endif;
        if ($this->input->post('sec_div_dept')) {
            $this->db->like('sec_div_dept', $this->input->post('sec_div_dept'));
        }
        
        $this->db->from($this->account);
        $this->db->join($this->manpower_form, 'manpower_form.create_by = account.code', 'LEFT');
        $this->db->join($this->app_manp_form, 'app_manp_form.form_id = manpower_form.id', 'LEFT');
        $this->db->where('manpower_form.removed', 0);
        $this->db->where('app_manp_form.dept_mgr_code',$code);
        $this->db->group_by('manpower_form.hr_no');
        $this->db->group_by('manpower_form.year');
        $this->db->order_by('app_manp_form.status_dept_mgr', 'ASC');
        $this->db->order_by('manpower_form.create_date', 'DESC');

        $i = 0;

        foreach ($this->column_search as $item) : // loop column

            if ($_POST['search']['value']) : // if datatable send POST for search

                if ($i === 0) : // first loop

                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);

                else :
                    $this->db->or_like($item, $_POST['search']['value']);

                endif;

                if (count($this->column_search) - 1 == $i) : //last loop

                    $this->db->group_end();

                endif;
            //close bracket
            endif;
            $i++;
        endforeach;

        if (isset($_POST['order'])) // here order processing
        {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_mgr()
    {
        $this->_get_datatables_query_mgr();

        if ($_POST['length'] != -1) :
            $this->db->limit($_POST['length'], $_POST['start']);
        endif;
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_mgr()
    {
        $this->_get_datatables_query_mgr();
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query_agm()
    {
        $code = $this->session->userdata('code');

        //add report filter here
        if ($this->input->post('req_posi_name')) :
            $this->db->like('req_posi_name', $this->input->post('req_posi_name'));
        endif;
        if ($this->input->post('rec_date')) :
            $this->db->like('rec_date', $this->input->post('rec_date'));
        endif;
        if ($this->input->post('cost_center')) :
            $this->db->like('cost_center', $this->input->post('cost_center'));
        endif;

        $this->db->from($this->account);
        $this->db->join($this->manpower_form, 'manpower_form.create_by = account.code', 'LEFT');
        $this->db->join($this->app_manp_form, 'app_manp_form.form_id = manpower_form.id', 'LEFT');
        $this->db->where('manpower_form.removed', 0);
        $this->db->where('app_manp_form.status_dept_mgr', 1);
        $this->db->where('app_manp_form.agm_code',$code);
        $this->db->group_by('manpower_form.hr_no');
        $this->db->group_by('manpower_form.year');
        $this->db->order_by('app_manp_form.status_agm', 'ASC');
        $this->db->order_by('manpower_form.create_date', 'DESC');

        $i = 0;

        foreach ($this->column_search as $item) : // loop column

            if ($_POST['search']['value']) : // if datatable send POST for search

                if ($i === 0) : // first loop

                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);

                else :
                    $this->db->or_like($item, $_POST['search']['value']);

                endif;

                if (count($this->column_search) - 1 == $i) : //last loop

                    $this->db->group_end();

                endif;
            //close bracket
            endif;
            $i++;
        endforeach;

        if (isset($_POST['order'])) // here order processing
        {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_agm()
    {
        $this->_get_datatables_query_agm();

        if ($_POST['length'] != -1) :
            $this->db->limit($_POST['length'], $_POST['start']);
        endif;
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_agm()
    {
        $this->_get_datatables_query_agm();
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query_gm()
    {
        $code = $this->session->userdata('code');

        //add report filter here
        if ($this->input->post('req_posi_name')) :
            $this->db->like('req_posi_name', $this->input->post('req_posi_name'));
        endif;
        if ($this->input->post('rec_date')) :
            $this->db->like('rec_date', $this->input->post('rec_date'));
        endif;
        if ($this->input->post('cost_center')) :
            $this->db->like('cost_center', $this->input->post('cost_center'));
        endif;

        $this->db->from($this->account);
        $this->db->join($this->manpower_form, 'manpower_form.create_by = account.code', 'LEFT');
        $this->db->join($this->app_manp_form, 'app_manp_form.form_id = manpower_form.id', 'LEFT');
        $this->db->where('manpower_form.removed', 0);
        $this->db->where('app_manp_form.gm_code',$code);
        $this->db->group_by('manpower_form.hr_no');
        $this->db->group_by('manpower_form.year');
        $this->db->order_by('app_manp_form.status_gm', 'ASC');
        $this->db->order_by('manpower_form.create_date', 'DESC');

        $i = 0;

        foreach ($this->column_search as $item) : // loop column

            if ($_POST['search']['value']) : // if datatable send POST for search

                if ($i === 0) : // first loop

                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);

                else :
                    $this->db->or_like($item, $_POST['search']['value']);

                endif;

                if (count($this->column_search) - 1 == $i) : //last loop

                    $this->db->group_end();

                endif;
            //close bracket
            endif;
            $i++;
        endforeach;

        if (isset($_POST['order'])) // here order processing
        {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_gm()
    {
        $this->_get_datatables_query_gm();

        if ($_POST['length'] != -1) :
            $this->db->limit($_POST['length'], $_POST['start']);
        endif;
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_gm()
    {
        $this->_get_datatables_query_gm();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->account);
        return $this->db->count_all_results();
    }
}
