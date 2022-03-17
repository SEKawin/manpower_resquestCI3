<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Notifications extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== true) :
            redirect('login');
        endif;
        // Load database
        $this->load->model('notifications_m', 'notifications_m');
    }

    public function notify_mgr()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_mgr($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_agm()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_agm($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_gm()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_gm($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_hr()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_hr($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_hrm_mgr()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_hrm_mgr($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_hrm_agm()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_hrm_agm($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_od()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_od($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_evp()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_evp($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_svp()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->notify_svp($code);
        echo json_encode($getAlerts);
        exit;
    }
}
