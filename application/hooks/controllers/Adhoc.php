<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Adhoc extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('account_model', 'account');
    }

    // ฟังก์ชันสำหรับอัพเดตฐานข้อมูลผู้ใช้งาน
    public function tbl_account_update()
    {
        $this->tbl_public_training();
    }

    // ฟังก์ชันสำหรับอัพเดตฐานข้อมูลผู้ใช้งานระบบผู้ขออนุมัตืฝึกอบรมภายนอก
    private function tbl_public_training()
    {

        $data = $this->account->get_all_account();

        foreach ($data as $rows) {
            $code = $rows->code;

            $username = $rows->code;

            $idcard = $rows->idcard;

            $password = md5(substr($idcard, -4));
            
            $this->account->update_all_account($code, $username, $password);

        }
        
    }

}

/* End of file adhoc.php */