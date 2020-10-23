<?php

class Post extends CI_Controller
{
    public function index()
    {
        $this->load->model('Post_Model');

        $data['kategori'] = $this->Post_Model->get_all_kategori();
        $data['post'] = $this->Post_Model->get_all_post();
        $data['total_post'] = $this->Post_Model->get_total_post();

        $data['title'] = 'Post';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/post', $data);
        $this->load->view('homepage/template/footer');
    }

    public function detail_post($idpost)
    {
        $this->load->model('Post_Model');
        $data['post'] = $this->Post_Model->get_detail($idpost)->row();
        $data['total_comment'] = $this->Post_Model->get_total_comment_by_post($idpost);
        $data['comment'] = $this->Post_Model->get_comment($idpost);

        $data['title'] = 'Detail Post';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/detail_post', $data);
        $this->load->view('homepage/template/footer');
    }

    public function by_kategori($idkategori)
    {
        $this->load->model('Post_Model');

        $data['post'] = $this->Post_Model->get_by_kategori($idkategori);
        $data['kategori'] = $this->Post_Model->get_all_kategori();
        $data['total_post'] = $this->Post_Model->get_total_post();

        $data['title'] = 'Post';
        $this->load->view('homepage/template/header', $data);
        $this->load->view('homepage/content/post', $data);
        $this->load->view('homepage/template/footer');
    }

    // public function post_comment()
    // {
    //     // $data['post'] = $this->Post_Model->get_detail($idpost)->row();
    //     // $idpost = $data['post']->;
    //     $this->form_validation->set_rules('message', 'Comment', 'required|trim');

    //     if (($this->form_validation->run() == TRUE)) {
    //         $data_comment = array(
    //             'nama' => $this->input->post('nama'),
    //             // 'idpost' => $idpost,
    //         );
    //         $data['comment'] = $data_comment;

    //         $this->db->insert('komentar', $data_comment);
    //         $this->session->set_flashdata('notification_berhasil', 'Your Comment Added!');
    //         redirect('Post/');
    //     }
    // }
}
