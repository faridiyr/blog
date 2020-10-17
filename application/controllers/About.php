<?php

class About extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'About';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/about', $data);
        $this->load->view('homepage/template/footer');
    }
}
