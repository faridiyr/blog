<?php

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_Model');
    }

    public function post()
    {
        $post = $this->Api_Model->get_all_post();
        echo json_encode($post);
    }

    public function post_by_kategori($id)
    {
        $post = $this->Api_Model->get_post_by_kategori($id);
        echo json_encode($post);
    }

    public function detail_post($id)
    {
        $post = $this->Api_Model->get_detail($id)->row();
        echo json_encode($post);
    }

    public function get_comment($id)
    {
        $post = $this->Api_Model->get_comment($id);
        echo json_encode($post);
    }

    public function search($key)
    {
        $post = $this->Api_Model->seacrh($key);
        echo json_encode($post);
    }

    public function recent_post()
    {
        $post = $this->Api_Model->get_post_recent();
        echo json_encode($post);
    }

    public function get_kategori()
    {
        $kategori = $this->Api_Model->get_all_kategori();
        echo json_encode($kategori);
    }
}
