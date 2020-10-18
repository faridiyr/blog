<?php

class Search extends CI_Controller
{
    public function index()
    {
        $this->load->model('Post_Model');

        $key = $_POST['top-search-bar'];
        $data['key'] = $key;
        $data['search'] = $this->Post_Model->seacrh($key);

        $data['title'] = 'Search';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/search', $data);
        $this->load->view('homepage/template/footer');
    }
}
