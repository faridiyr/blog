<?php

class Dashboard_Admin extends CI_Controller
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
    }

    public function index()
    {
        if ($this->session->userdata('level') == 'penulis') {
            $this->load->model('Auth_Model');
            $id = $this->session->userdata('id');
            $data['user_loged'] = $this->Auth_Model->get_data_penulis_session($id)->row();
        } elseif ($this->session->userdata('level') == 'admin') {
            $this->load->model('Auth_Model');
            $id = $this->session->userdata('id');
            $data['user_loged'] = $this->Auth_Model->get_data_admin_session($id)->row();
        }

        $this->load->model('Dashboard_Model');
        $this->load->model('Kategori_Model');
        $data['kategori'] = $this->Kategori_Model->get_pie_kategori();
        $data['chartpie'] = $this->Dashboard_Model->getCountPostPerCat();

        $data['total_kategori'] = $this->Dashboard_Model->get_total_kategori();
        $data['total_penulis'] = $this->Dashboard_Model->get_total_penulis();
        $data['total_post'] = $this->Dashboard_Model->get_total_post();

        $data['title'] = 'Dashboard';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/dashboard_admin', $data);
        $this->load->view('admin/template/footer');
    }
}
