<?php

class Kelola_Post extends CI_Controller
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

        $this->load->model('Post_Model');
        $this->load->model('Kategori_Model');
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

        $data['post'] = $this->Post_Model->get_all_post_by_penulis($idpenulis);

        $data['title'] = 'Kelola Post';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar_penulis');
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/content/kelola_post', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_post()
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

        if (isset($_POST['tambah'])) {
            $this->form_validation->set_rules('judul', 'Judul Post', 'required');
            $this->form_validation->set_rules('tgl_insert', 'Tanggal', 'required');

            //Mengambil filename gambar untuk disimpan
            $nmfile = "file_" . time();
            $config['upload_path'] = './assets/upload/post/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; //kb
            $config['file_name'] = $nmfile;

            $date = date_create($this->input->post('tgl_insert'));
            $dateformat = date_format($date, "Y-m-d");

            $isi = $this->input->post('editor1');
            $idpenulis = $this->session->userdata('id');

            if ($isi == NULL) {
                $this->session->set_flashdata('notification_gagal', 'Post gagal ditambahkan, Deskripsi tidak boleh kosong');
                redirect('Kelola_Post');
            } elseif (($this->form_validation->run() == TRUE) && (!empty($_FILES['file_gambar']['name']))) {
                $gbr = NULL;

                $post = array(
                    'judul' => $this->input->post('judul'),
                    'idkategori' => $this->input->post('kategori'),
                    'isi_post' => $isi,
                    'file_gambar' => NULL,
                    'tgl_insert' => $dateformat,
                    'tgl_update' => $dateformat,
                    'idpenulis' => $idpenulis
                );
                $data['post'] = $post;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file_gambar')) {
                    $gbr = $this->upload->data();
                    $post['file_gambar'] = $gbr['file_name'];

                    $this->db->insert('post', $post);
                    $this->session->set_flashdata('notification_berhasil', 'Post berhasil ditambahkan');
                    redirect('Kelola_Post');
                } else {
                    $this->session->set_flashdata('notification_gagal', 'Post gagal ditambahkan, cek type file dan ukuran file yang anda upload');

                    $data['post'] = $this->Post_Model->get_all_post_by_penulis($idpenulis);

                    $data['kategori'] = $this->Kategori_Model->get_all_kategori();

                    $data['title'] = 'Tambah Post';
                    $this->load->view('admin/template/header', $data);
                    $this->load->view('admin/template/sidebar_penulis');
                    $this->load->view('admin/template/navbar');
                    $this->load->view('admin/content/tambah_post', $data);
                    $this->load->view('admin/template/footer');
                }
            } else {
                $this->session->set_flashdata('notification_gagal', 'Post gagal ditambahkan');
                $this->tambah_post();
            }
        } else {
            $data['kategori'] = $this->Kategori_Model->get_all_kategori();

            $data['title'] = 'Tambah Post';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar_penulis');
            $this->load->view('admin/template/navbar');
            $this->load->view('admin/content/tambah_post', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function edit_post($idpost)
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

        if (isset($_POST['simpan'])) {
            $this->form_validation->set_rules('judul', 'Judul Post', 'required');

            //Mengambil filename gambar untuk disimpan
            $nmfile = "file_" . time();
            $config['upload_path'] = './assets/upload/post/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; //kb
            $config['file_name'] = $nmfile;

            $date = date_create($this->input->post('tgl_update'));
            $dateformat = date_format($date, "Y-m-d");

            $idpenulis = $this->session->userdata('id');

            $isi = $this->input->post('editor1');

            $data_update_post = array(
                'judul' => $this->input->post('judul'),
                'idkategori' => $this->input->post('kategori'),
                'isi_post' => $isi,
                'tgl_update' => $dateformat,
                'file_gambar' => $this->input->post('file_gambar_lama'),
            );

            if ($isi == NULL) {
                $this->session->set_flashdata('notification_gagal', 'Post gagal ditambahkan, Deskripsi tidak boleh kosong');
                redirect('Kelola_Post');
            } elseif (($this->form_validation->run() == TRUE)) {
                $gbr = NULL;
                $iserror = false;
                if ((!empty($_FILES['file_gambar_baru']['name']))) {
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('file_gambar_baru')) {
                        $gbr = $this->upload->data();
                        $data_update_post['file_gambar'] = $gbr['file_name'];

                        //hapus file dari folder
                        $data_gambar_lama = $this->input->post('file_gambar_lama');
                        $filehapus = './assets/upload/post/' . $data_gambar_lama;
                        unlink($filehapus);
                    } else {
                        $this->session->set_flashdata('notification_gagal', 'Post gagal ditambahkan, cek type file dan ukuran file yang anda upload');

                        $data['post'] = $this->Post_Model->get_all_post_by_penulis($idpenulis);

                        $data['kategori'] = $this->Kategori_Model->get_all_kategori();

                        $data['title'] = 'Tambah Post';
                        $this->load->view('admin/template/header', $data);
                        $this->load->view('admin/template/sidebar_penulis');
                        $this->load->view('admin/template/navbar');
                        $this->load->view('admin/content/kelola_post', $data);
                        $this->load->view('admin/template/footer');
                    }
                }
                if (!$iserror) {
                    $this->db->update('post', $data_update_post, array('idpost' => $idpost));
                    $this->session->set_flashdata('notification_berhasil', 'Post berhasil diperbarui!');
                    redirect('Kelola_Post');
                }
            }
        } else {
            $data['edit_post'] = $this->Post_Model->select_post_by_id($idpost)->row();

            $date = $data['edit_post']->tgl_update;

            $dateformat_database = date("Y-m-d", strtotime($date));

            $data_post = array(
                'idpost' => $data['edit_post']->idpost,
                'judul' => $data['edit_post']->judul,
                'idkategori' => $data['edit_post']->idkategori,
                'isi_post' => $data['edit_post']->isi_post,
                'tgl_update' => $dateformat_database,
                'file_gambar' => $data['edit_post']->file_gambar,
                'idpenulis' => $data['edit_post']->idpenulis
            );

            $data['post'] = $data_post;

            $data['kategori'] = $this->Kategori_Model->get_all_kategori();

            $data['title'] = 'Edit Post';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar_penulis');
            $this->load->view('admin/template/navbar');
            $this->load->view('admin/content/edit_post', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function delete_post()
    {
        $idpost = $_POST['idpost'];

        //load data folder
        $data['post'] = $this->Post_Model->select_post_by_id($idpost)->row();
        $file = $data['post']->file_gambar;

        //hapus file dari folder
        $filehapus = './assets/upload/post/' . $file;
        unlink($filehapus);

        //  hapus dari database
        $this->Post_Model->delete_post($idpost);
    }
}
