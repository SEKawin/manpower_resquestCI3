<?php
class Idp_model extends CI_Model
{
    public $sendmail = 'sendmail';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();

    }

    public function sendmail()
    {

    }

    
}