<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in()
{
    $CI =& get_instance();
    if (!isset($CI->session))
        $CI->load->library('session');
    $user_id = $CI->session->userdata('user_id');
    $CI->load->model('auth_model', 'auth');
    return $CI->auth->check_account($user_id);
}

function get_user_id()
{
    $CI =& get_instance();
    if (!isset($CI->session))
        $CI->load->library('session');
    $user_id = $CI->session->userdata('user_id');
    $CI->load->model('auth_model', 'auth');
    return $CI->auth->get_data($user_id, 'id')->id;
}

function get_userdata($select = '*')
{
    $CI =& get_instance();
    if (!isset($CI->session))
        $CI->load->library('session');
    $user_id = $CI->session->userdata('user_id');
    $CI->load->model('auth_model', 'auth');
    return $CI->auth->get_data($user_id, $select);
}
