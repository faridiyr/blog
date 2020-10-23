<?php

class Kelola_Penulis extends CI_Controller
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

        $this->load->model('Penulis_Model');
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

        $data['penulis'] = $this->Penulis_Model->get_all_penulis();

        $data['title'] = 'Kelola Penulis';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/kelola_penulis', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_penulis()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[penulis.email]', array('is_unique' => 'Email already exist, Use an other Email Address!'));
        $this->form_validation->set_rules('address', 'Address', 'required|trim|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('city', 'City', 'required|trim|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

        if ($this->form_validation->run() == true) {
            $penulis = array(
                'nama' => $this->input->post('name'),
                'password' => md5($this->input->post('password')),
                'alamat' => $this->input->post('address'),
                'kota' => $this->input->post('city'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('phone'),
                'file_gambar' => $this->input->post('file_gambar')
            );
            $data['penulis'] = $penulis;
            $this->db->insert('penulis', $penulis);
            $this->session->set_flashdata('notification_berhasil', 'Akun Penulis berhasil ditambahkan!');
            redirect('Kelola_Penulis');
        } else {
            $this->session->set_flashdata('notification_gagal', 'Penulis gagal ditambahkan');
            redirect('Kelola_Penulis');
        }
    }

    public function edit_penulis()
    {
        $idpenulis = $this->input->post('idpenulis');

        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[penulis.email]', array('is_unique' => 'Email already exist, Use an other Email Address!'));
        $this->form_validation->set_rules('address', 'Address', 'required|trim|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('city', 'City', 'required|trim|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

        $data_update_penulis = array(
            'nama' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('address'),
            'kota' => $this->input->post('city'),
            'no_telp' => $this->input->post('phone'),
        );
        $data['penulis'] = $data_update_penulis;

        $this->db->update('penulis', $data_update_penulis, array('idpenulis' => $idpenulis));
        $this->session->set_flashdata('notification_berhasil', 'Penulis berhasil diubah');
        redirect('Kelola_Penulis');
    }

    public function delete_penulis()
    {
        $idpenulis = $_POST['idpenulis'];

        $this->Penulis_Model->delete_penulis($idpenulis);
    }
}
