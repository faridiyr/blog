<?php

class Post extends CI_Controller
{
    public function index()
    {
        $this->load->model('Post_Model');

        $data['kategori'] = $this->Post_Model->get_all_kategori();
        $data['post'] = $this->Post_Model->get_all_post();
        // $key = $_POST['kategori'];
        // $data['by_kategori'] = $this->Post_Model->get_by_kategori($key);

        $data['title'] = 'Post';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/post', $data);
        // $this->load->view('homepage/content/get_post_by_kategori', $data);
        $this->load->view('homepage/template/footer');
    }
}
