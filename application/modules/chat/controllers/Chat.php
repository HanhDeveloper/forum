<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller
{
    public $autoload = array(
        'model' => array('Chat_' => 'chat')
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->method() === 'post') {

            $this->chat->insert(array(
                'user_id' => get_user_id(),
                'message' => $this->input->post('message'),
                'time' => time()
            ));

            $this->refresh();
        }

        $this->title('Chatbox');
        $this->render('chat');
    }

    public function messages()
    {
        if ($this->input->method() === 'post') {
            //$first_id = $this->input->post('first_id');
            $last_id = $this->input->post('last_id');
            $messages = $this->chat->get_all($last_id ? $last_id : 0);
            $this->set(array('success' => true, 'messages' => $messages));
            $this->render();
            return;
        }

        $this->set(array('success' => false, 'message' => 'err'));
        $this->render();
    }

    public function save_message()
    {
        if ($this->input->method() === 'post') {

            if ($this->check_validation()) {

                $msg_id = $this->chat->insert(array(
                    'user_id' => get_user_id(),
                    'message' => $this->input->post('message'),
                    'time' => time()
                ));

                $this->set(array('success' => true, 'message' => $this->chat->get($msg_id)));
                $this->render();
                return;
            }
        }

        $this->set(array('success' => false, 'message' => 'err'));
        $this->render();
    }

    private function check_validation()
    {
        $this->form_validation->set_rules('message', '', 'trim|required|strip_tags');
        return $this->form_validation->run();
    }
}