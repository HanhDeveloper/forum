<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{
    private $data = array();

    public function __construct()
    {
        parent::__construct();
    }

    protected function set_title($title)
    {
        $this->data['title'] = $title;
    }

    protected function set_data($data = array())
    {
        $this->data = array_merge($this->data, $data);
    }

    protected function render($the_view = NULL, $template = 'master')
    {
        if ($template == 'json' || $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        } elseif (is_null($template)) {
            $this->load->view($the_view, $this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->load->view($template . '/layout', $this->data);
        }
    }
}