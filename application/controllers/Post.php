<?php

class Post extends CI_Controller
{
    public function index()
    {
        $this->load->model('Post_Model');

        $data['post'] = $this->Post_Model->get_all_post();
        $data['kategori'] = $this->Post_Model->get_all_kategori();

        $data['title'] = 'Post';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/post', $data);
        $this->load->view('homepage/template/footer');
    }
}
