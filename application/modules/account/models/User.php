<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Model
{
    protected $table = 'users';

    public function update_account($data)
    {
        $this->update(get_user_id(), $data);
    }
}