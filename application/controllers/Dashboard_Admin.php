<?php

class Dashboard_Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu!</div>');
            redirect('Auth');
        }
    }

    public function index()
    {
        // $data = $this->session->userdata();
        // var_dump($data);
        // die;

        $data['title'] = 'Dashboard';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/dashboard_admin');
        $this->load->view('admin/template/footer');
    }
}
