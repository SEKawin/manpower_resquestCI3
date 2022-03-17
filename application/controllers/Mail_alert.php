<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail_alert extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->model('account_model', 'account_m');
		$this->load->model('manpower_form_m', 'manpower_form_m');
		$this->load->model('approval_m', 'approval_m');
	}
	
	public function mail_alert($manp_form_id, $code)
	{
		$data = $this->manpower_form_m->get_view_manp_form($manp_form_id);

		print_r($data);
		die;
		$message = $this->load->view('mail_notify/notify', $data, true);

		$to_email =  'kawin_a@thaisummit-harness.co.th';

		$from_email = "noreply@tshpcl.com";

		// Load email library
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'noreply.publictraining@gmail.com',
			'smtp_pass' => 'HRD_publictraining',
			'mailtype' => 'html',
			'charset' => 'utf-8',
		);
		$this->load->library('email', $config);
		// $this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
		$this->email->set_header('Content-type', 'text/html'); //must add this line
		$this->email->from($from_email, 'MANPOWER REQUISTION FORM'); //จากอีเมล์
		$this->email->to($to_email); // ส่ง อีเมล์
		$this->email->subject('Request for Approval Manpower Requistion form'); // หัวข้อ
		$this->email->message($message); // รายละเอียด
		// Send mail
		$send = $this->email->send();
		$showerror = $this->email->print_debugger();
	}
}
