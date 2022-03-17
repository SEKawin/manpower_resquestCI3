<?php
class Account_model extends CI_Model
{
	public $account = 'account';
	public $account_of_role = 'account_of_role';
	public $account_role = 'account_role';
	public $organ_chart = 'organ_chart';
	public $app_manp_form = 'app_manp_form';
	public $manpower_form = 'manpower_form';

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get_acc_by_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->account, 1);
		return $query->row();
	}
	public function validate_login_db($username, $password)
	{
		$username = $this->security->xss_clean($username);
		$password = $this->security->xss_clean($password);

		$this->db->from($this->account);
		$this->db->join($this->account_of_role, 'account_of_role.account_code = hr_account.code', 'LEFT');
		$this->db->join($this->account_role, 'hr_account_role.id = account_of_role.role_id', 'LEFT');
		$this->db->where('hr_account.username', $username);
		$this->db->where('hr_account.password', $password);
		$query = $this->db->get();
		return $query;
	}

	public function validate_login($username, $password)
	{
		$username = $this->security->xss_clean($username);
		$password = $this->security->xss_clean($password);

		$this->db->where('hr_account.username', $username);
		$this->db->where('hr_account.password', $password);
		$query = $this->db->get($this->account, 1);
		return $query;
	}
	public function get_all_account()
	{
		$query = $this->db->where('role', 'EMPLOYEE');
		$query = $this->db->get($this->account);
		return $query->result();
	}

	// User Manage
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
	// User Manage

	public function get_role($account_code)
	{
		$this->db->from($this->account_of_role);
		$this->db->join($this->account_role, 'account_role.id = account_of_role.role_id', 'LEFT');
		$this->db->where('account_of_role.account_code', $account_code);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_account_code($emp_code)
	{
		$this->db->from($this->account);
		$this->db->where('account.code', $emp_code);
		$query = $this->db->get();
		return $query->result();
	}

	// ดึงข้อมูลรายชื่อที่เลือกผู้จัดกานฝ่าย
	public function get_list_mgr()
	{
		$this->db->select('hr_account.code,hr_account.salutation, hr_account.firstname_th,
		hr_account.lastname_th,hr_account.email,hr_account.position,hr_account.department_code,hr_account.department_title');
		$this->db->from($this->organ_chart);
		$this->db->join($this->account, 'organ_chart.deptmgr_code = account.code', 'LEFT');
		$this->db->where('account.code = organ_chart.deptmgr_code');
		$query = $this->db->get();
		return $query->result();
	}
	// ดึงข้อมูลรายชื่อที่เลือกผู้จัดกานฝ่าย

	// ดึงข้อมูลรายชื่อที่เลือกผู้ช่วยผู้จัดการทั่วไป
	public function get_list_agm()
	{
		$this->db->select('hr_account.code,hr_account.salutation, hr_account.firstname_th,
		hr_account.lastname_th,hr_account.email,hr_account.position');
		$this->db->from($this->organ_chart);
		$this->db->join($this->account, 'organ_chart.agm_code = account.code', 'LEFT');
		$this->db->where('account.code = organ_chart.agm_code');
		$query = $this->db->get();
		return $query->result();
	}
	// ดึงข้อมูลรายชื่อที่เลือกผู้ช่วยผู้จัดการทั่วไป

	// ดึงข้อมูลรายชื่อที่เลือกผู้จัดการทั่วไป
	public function get_list_gm()
	{
		$this->db->select('hr_account.code,hr_account.salutation, hr_account.firstname_th,
		hr_account.lastname_th,hr_account.email,hr_account.position');
		$this->db->from($this->organ_chart);
		$this->db->join($this->account, 'organ_chart.gm_code = account.code', 'LEFT');
		$this->db->where('account.code = organ_chart.gm_code');
		$query = $this->db->get();
		return $query->result();
	}
	// ดึงข้อมูลรายชื่อที่เลือกผู้จัดการทั่วไป

	public function get_hrm_admin($account_code)
	{
		$this->db->from($this->account_of_role);
		$this->db->join($this->account_role, 'account_role.id = account_of_role.role_id', 'LEFT');
		$this->db->where('account_of_role.account_code', $account_code);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_approval_mgr()
	{
		$this->db->select('hr_account.code,hr_account.salutation, hr_account.firstname_th,
		hr_account.lastname_th,hr_account.email,hr_account.position');
		$this->db->from($this->account);
		$this->db->join($this->app_manp_form, 'hr_account.code = hr_app_manp_form.dept_mgr_code', 'LEFT');
		$this->db->where('hr_account.code = hr_app_manp_form.dept_mgr_code');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_organ_chart_all()
	{
		$query = $this->db->get($this->organ_chart);
		return $query->result();
	}

	public function save_account($data)
	{
        $this->db->insert($this->account, $data);
        return $this->db->insert_id();
    }

	public function remove_by_code($code)
	{
		$this->db->where('code', $code);
		$this->db->delete($this->account);
	}
}
