<?php
class Sendingemail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('contact_email_form');
    }

    public function send_mail()
    {
        $from_email = "kawin_a@thaisummit.co.th";
        $to_email = $this->input->post('email');

        $this->email->from($from_email);
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        //Send mail
        if ($this->email->send()) {
            $this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
        } else {
            $this->session->set_flashdata("email_sent", "You have encountered an error");
        }

        $this->load->view('contact_email_form');
    }
}
