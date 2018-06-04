<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
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
        $this->title('Thành viên');
        $this->render('users');
    }

    public function member()
    {
        $this->title('Danh sách thành viên');
        $this->set('list_user', $this->user->get_all());
        $this->render('list-user');
    }

    public function staff()
    {
        $this->title('Ban quản trị');
        $this->set('list_user', $this->user->get_all());
        $this->render('list-user');
    }
}