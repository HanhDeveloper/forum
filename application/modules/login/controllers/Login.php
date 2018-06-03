<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    public $autoload = array(
        'model' => array('user_model' => 'user')
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->method() === 'post') {

            if ($this->check_validation()) {

                // login
                $user = $this->user->get_by(array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                ));
                if (!empty($user)) {
                    $this->session->set_userdata('user_id', $user->id);
                    redirect();
                }
            }
        }

        $this->title('Đăng nhập');
        $this->render('login');
    }

    private function check_validation()
    {
        $this->form_validation->set_rules('username', '', 'trim|required');
        $this->form_validation->set_rules('password', '', 'trim|required');
        return $this->form_validation->run();
    }
}