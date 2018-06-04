<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Model
{
    protected $table = 'chats';

    public function get_all($id = 0)
    {
        $query = $this->db
            ->select('chats.*, users.fullname as name, users.username')
            ->from($this->table)
            ->join('users', 'users.id = chats.user_id', 'right')
            ->where('chats.id >', $id)
            ->order_by('chats.time')
            ->get();
        return $query->result_array();
    }
}