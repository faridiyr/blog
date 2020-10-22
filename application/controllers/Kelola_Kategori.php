<?php

class Kelola_Kategori extends CI_Controller
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

        $this->load->model('Kategori_Model');
        $this->load->library('form_validation');
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

        $data['kategori'] = $this->Kategori_Model->get_all_kategori();

        $data['title'] = 'Kelola Kategori';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/kelola_kategori', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_kategori()
    {
        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

        if (($this->form_validation->run() == TRUE)) {
            $data_kategori = array(
                'nama' => $this->input->post('nama')
            );
            $data['kategori'] = $data_kategori;

            $this->db->insert('kategori', $data_kategori);
            $this->session->set_flashdata('notification_berhasil', 'Kategori berhasil ditambahkan');
            redirect('Kelola_Kategori');
        } else {
            $this->session->set_flashdata('notification_gagal', 'Kategori gagal ditambahkan');

            $data['kategori'] = $this->Kategori_Model->get_all_kategori();

            $data['title'] = 'Kelola Kategori';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/navbar');
            $this->load->view('admin/content/kelola_kategori', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function edit_kategori()
    {
        $idkategori = $this->input->post('idkategori');

        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

        $data_update_kategori = array(
            'nama' => $this->input->post('nama')
        );
        $data['kategori'] = $data_update_kategori;

        $this->db->update('kategori', $data_update_kategori, array('idkategori' => $idkategori));
        $this->session->set_flashdata('notification_berhasil', 'Kategori berhasil ditambahkan');
        redirect('Kelola_Kategori');
    }

    public function delete_kategori()
    {
        $idkategori = $_POST['idkategori'];

        $this->Kategori_Model->delete_kategori($idkategori);
    }
}
