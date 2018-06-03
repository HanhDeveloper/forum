<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->method() === 'post') {
            $this->session->unset_userdata('user_id');
            redirect();
        }

        $this->title('Đăng xuất');
        $this->render('logout');
    }
}