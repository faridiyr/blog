<?php

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('Post_Model');

        $data['recent_post'] = $this->Post_Model->get_post_recent();

        $data['title'] = 'Home';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/home');
        $this->load->view('homepage/template/footer');
    }
}
