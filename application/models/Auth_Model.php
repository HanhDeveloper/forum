<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends MY_Model
{
    public function check_account($user_id)
    {
        return $this->db->select('id')
                ->from('users')
                ->where('id', $user_id)
                ->limit(1)
                ->count_all_results() > 0;
    }

    public function get_data($user_id, $select = '*')
    {
        return $this->db->select($select)
            ->from('users')
            ->where('id', $user_id)
            ->limit(1)
            ->get()
            ->row();
    }
}