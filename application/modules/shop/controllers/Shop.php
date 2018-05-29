<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('shop');
    }

    public function buy_coin()
    {
        $this->render('buy-coin');
    }

    public function send_coin()
    {
        $this->render('send-coin');
    }

    function history()
    {
        $this->render('history');
    }
}