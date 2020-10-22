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
        $this->load->helper('url');
        $this->load->helper('form');
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

        $idpenulis = $this->session->userdata('id');

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
        if ($this->session->userdata('level') == 'penulis') {
            $this->load->model('Auth_Model');
            $id = $this->session->userdata('id');
            $data['user_loged'] = $this->Auth_Model->get_data_penulis_session($id)->row();
        } elseif ($this->session->userdata('level') == 'admin') {
            $this->load->model('Auth_Model');
            $id = $this->session->userdata('id');
            $data['user_loged'] = $this->Auth_Model->get_data_admin_session($id)->row();
        }

        $idpenulis = $this->session->userdata('id');

        if (isset($_POST['simpan'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('address', 'Address', 'required|trim|min_length[4]|max_length[100]');
            $this->form_validation->set_rules('city', 'City', 'required|trim|min_length[4]|max_length[100]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

            //Mengambil filename gambar untuk disimpan
            $nmfile = "file_" . time();
            $config['upload_path'] = './assets/upload/avatar/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; //kb
            $config['file_name'] = $nmfile;

            $data_update_profile = array(
                'nama' => $this->input->post('name'),
                'alamat' => $this->input->post('address'),
                'kota' => $this->input->post('city'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('phone'),
                'file_gambar' => $this->input->post('file_gambar_lama')
            );

            $data['edit_profile'] = $data_update_profile;

            if ($this->form_validation->run() == true) {
                $gbr = NULL;
                $iserror = false;
                if ((!empty($_FILES['file_gambar_baru']['name']))) {
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('file_gambar_baru')) {
                        $gbr = $this->upload->data();
                        $data_update_profile['file_gambar'] = $gbr['file_name'];
                    } else {
                        $this->session->set_flashdata('notification_gagal', 'Akun gagal diubah!');
                        $iserror = true;
                    }
                }
                if (!$iserror) {
                    $this->db->update('penulis', $data_update_profile, array('idpenulis' => $idpenulis));
                    $this->session->set_flashdata('notification_berhasil', 'Akun berhasil diubah!');
                    redirect('Kelola_Profile_Penulis');
                }
            } else {
                $this->session->set_flashdata('notification_gagal', 'Akun gagal diubah!');
                redirect('Kelola_Profile_Penulis/edit_profile');
            }
        } else {
            $data['user'] = $this->Profile_Model->get_data_penulis_session($idpenulis)->row();

            $data['title'] = 'Edit Profile';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar_penulis');
            $this->load->view('admin/template/navbar');
            $this->load->view('admin/content/edit_profile_penulis', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function edit_password()
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

        $idpenulis = $this->session->userdata('id');
        $data['password'] = $this->Profile_Model->get_password_penulis($idpenulis)->row();

        $this->form_validation->set_rules('current_password', 'Old Password', 'required|trim|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('retype_password', 'Retype Password', 'required|trim|matches[new_password]');

        $data_update_password = array(
            'password' => md5($this->input->post('new_password'))
        );

        if ($this->form_validation->run() == true) {
            if (md5($this->input->post('current_password')) != $this->input->post('password')) {
                $this->session->set_flashdata('notification_gagal', 'Password gagal diubah, Current Password salah!');
                redirect('Kelola_Profile_Penulis/edit_password');
            } else {
                $this->db->update('penulis', $data_update_password, array('idpenulis' => $idpenulis));
                $this->session->set_flashdata('notification_berhasil', 'Password berhasil diubah!');
                redirect('Kelola_Profile_Penulis/edit_password');
            }
        }

        $data['title'] = 'Change Password';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar_penulis');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/edit_password_penulis', $data);
        $this->load->view('admin/template/footer');
    }
}
