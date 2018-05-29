<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends MY_Controller
{
    public $autoload = array(
        'helper' => array('captcha')
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo $this->get_captcha();
    }

    private function get_captcha()
    {
        $vals = array(
            'img_path' => './uploads/captcha/',
            'img_url' => base_url('uploads/captcha'),
            'img_width' => 150,
            'img_height' => 30,
            'expiration' => 60,
            'word_length' => 8,
            'font_size' => 16,
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
        $captcha = create_captcha($vals);
        $this->session->set_userdata('captcha', $captcha);
        return $captcha['image'];
    }
}