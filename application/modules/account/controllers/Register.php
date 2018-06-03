<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller
{
    public $autoload = array(
        'libraries' => array('user_agent'),
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

                // register a new member
                $user_id = $this->user->insert(array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'fullname' => $this->input->post('fullname'),
                    'sex' => $this->input->post('sex'),
                    'about' => $this->input->post('about'),
                    'rights' => 0,
                    'ip' => $this->input->ip_address(),
                    'ip_via_proxy' => $this->input->ip_address(),
                    'browser' => $this->agent->browser(),
                    'datereg' => time()
                ));

                // register success
                if ($user_id) {
                    $this->set(array(
                        'id' => $user_id,
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password'),
                        'need_activate' => false
                    ));
                    $this->render('register-success');
                    return;
                }
            }
        }

        $this->title('Đăng ký');
        $this->render('register');
    }

    private function check_validation()
    {
        $this->form_validation->set_rules('username', '', 'trim|required|regex_match[/^[a-zA-Z\d]+$/]|min_length[6]|max_length[32]|is_unique[users.username]');
        $this->form_validation->set_rules('password', '', 'trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('cf_password', '', 'trim|required|matches[password]');
        $this->form_validation->set_rules('fullname', '', 'trim|required|min_length[8]|max_length[32]|strip_tags');
        $this->form_validation->set_rules('sex', '', 'trim|required|in_list[?,m,f]');
        return $this->form_validation->run();
    }
}