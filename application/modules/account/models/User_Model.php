<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
    public function update_account($data)
    {
        $this->update(get_user_id(), $data);
    }
}