<?php

class Kelola_Profile_Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu!</div>');
            redirect('Auth');
        } elseif ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert"> Anda bukan Admin!</div>');
            redirect('Auth');
        }

        $this->load->model('Profile_Model');
    }

    public function index()
    {
        $idadmin = $this->session->userdata('idadmin');

        $data['user'] = $this->Profile_Model->get_data_admin_session($idadmin)->row();

        $data['title'] = 'My Profile';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/profile_admin', $data);
        $this->load->view('admin/template/footer');
    }
}