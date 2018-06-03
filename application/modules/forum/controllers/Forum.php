<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends MY_Controller
{
    public $autoload = array(
        'model' => array('forum_model' => 'forum')
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->set('forums', $this->forum->with('categories')->get_all());
        $this->render('forum');
    }
}