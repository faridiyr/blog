<?php

class Kelola_Profile_Penulis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu!</div>');
            redirect('Auth');
        } elseif ($this->session->userdata('level') != 'penulis') {
            $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert"> Anda bukan Penulis!</div>');
            redirect('Auth');
        }

        $this->load->model('Profile_Model');
    }

    public function index()
    {
        $idpenulis = $this->session->userdata('idpenulis');

        $data['user'] = $this->Profile_Model->get_data_penulis_session($idpenulis)->row();

        $data['title'] = 'My Profile';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar_penulis');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/profile_penulis', $data);
        $this->load->view('admin/template/footer');
    }

    public function edit_profile()
    {
        $idpenulis = $this->session->userdata('idpenulis');

        $data['user'] = $this->Profile_Model->get_data_penulis_session($idpenulis)->row();

        $data['title'] = 'My Profile';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar_penulis');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/edit_profile_penulis', $data);
        $this->load->view('admin/template/footer');
    }

    public function edit_password()
    {
        $idpenulis = $this->session->userdata('idpenulis');

        $data['user'] = $this->Profile_Model->get_data_penulis_session($idpenulis)->row();

        $data['title'] = 'My Profile';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar_penulis');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/edit_password_penulis', $data);
        $this->load->view('admin/template/footer');
    }
}
