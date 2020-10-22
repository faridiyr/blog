<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_Model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('admin/template/auth_header', $data);
        $this->load->view('admin/content/login');
        $this->load->view('admin/template/auth_footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $level = $this->input->post('level');

        if ($this->form_validation->run() == true) {
            if ($level == 'admin') {
                $admin = $this->Auth_Model->cek_user_data_admin($email, $password)->row_array();
                if (isset($admin)) {
                    $status = true;
                } else {
                    $status = false;
                }
                if ($status == true) {
                    $data = array(
                        'id' => $admin['idadmin'],
                        'nama' => $admin['nama'],
                        'email' => $admin['email'],
                        'password' => $admin['password'],
                        'file_gambar' => $admin['file_gambar'],
                        'level' => 'admin',
                        'login' => true
                    );
                    $this->session->set_userdata($data);
                    redirect('Dashboard_Admin');
                } else {
                    $this->session->set_flashdata('notification', '<div class="alert alert-danger">Email dan Password tidak ditemukan!</div>');
                    redirect('Auth/index');
                }
            } elseif ($level == 'penulis') {
                $penulis = $this->Auth_Model->cek_user_data_penulis($email, $password)->row_array();
                if (isset($penulis)) {
                    $status = true;
                } else {
                    $status = false;
                }
                if ($status == true) {
                    $data = array(
                        'id' => $penulis['idpenulis'],
                        'nama' => $penulis['nama'],
                        'email' => $penulis['email'],
                        'password' => $penulis['password'],
                        'file_gambar' => $penulis['file_gambar'],
                        'level' => 'penulis',
                        'login' => true
                    );
                    $this->session->set_userdata($data);
                    redirect('Dashboard_Penulis');
                } else {
                    $this->session->set_flashdata('notification', '<div class="alert alert-danger">Email dan Password Penulis tidak ditemukan!</div>');
                    redirect('Auth/index');
                }
            }
        } else {
            $data['title'] = 'Login';
            $this->load->view('admin/template/auth_header', $data);
            $this->load->view('admin/content/login');
            $this->load->view('admin/template/auth_footer');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('notification', '<div class="alert alert-info">Logout Success!</div>');
        redirect('Auth');
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[penulis.email]', array('is_unique' => 'Email already exist, Use an other Email Address!'));
        $this->form_validation->set_rules('address', 'Address', 'required|trim|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('city', 'City', 'required|trim|min_length[4]|max_length[100]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == true) {
            $penulis = array(
                'nama' => $this->input->post('name'),
                'password' => md5($this->input->post('password1')),
                'alamat' => $this->input->post('address'),
                'kota' => $this->input->post('city'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('phone'),
                'file_gambar' => 'default_penulis.png'
            );
            $data['penulis'] = $penulis;
            $this->db->insert('penulis', $penulis);
            $this->session->set_flashdata('notification', '<div class="alert alert-success">Akun Penulis berhasil dibuat!</div>');
            redirect('Auth');
        } else {
            $data['title'] = 'Registration';
            $this->load->view('admin/template/auth_header', $data);
            $this->load->view('admin/content/registration');
            $this->load->view('admin/template/auth_footer');
        }
    }
}
