<?php

class Post extends CI_Controller
{
    public function index()
    {
        $this->load->model('Post_Model');

        $data['kategori'] = $this->Post_Model->get_all_kategori();
        $data['post'] = $this->Post_Model->get_all_post();

        $data['title'] = 'Post';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/post', $data);
        $this->load->view('homepage/template/footer');
    }

    public function detail_post($idpost)
    {
        $this->load->model('Post_Model');
        $data['post'] = $this->Post_Model->get_detail($idpost)->row();

        $data['title'] = 'Detail Post';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/detail_post', $data);
        $this->load->view('homepage/template/footer');
    }
}
