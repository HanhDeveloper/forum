<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends MY_Model
{
    protected $table = 'forums';

    protected $has_many = array(
        'threads' => array('model' => 'thread_model', 'primary_key' => 'forum_id'),
        'categories' => array('model' => 'forum_model', 'primary_key' => 'refid'),
    );
}