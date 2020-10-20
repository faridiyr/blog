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
    }
}
