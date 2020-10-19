<?php

class Post_Model extends CI_Model
{


    function construct()
    {
        parent::__construct();
    }

    function get_post_recent()
    {
        $query = $this->db->query("SELECT post.idpost as idpost, 
                                    post.judul as judul, post.idkategori as idkategori, 
                                    post.isi_post as isi_post, 
                                    post.file_gambar as gambar_post, 
                                    post.tgl_insert as tgl_insert, 
                                    post.tgl_update as tgl_update, 
                                    penulis.file_gambar as gambar_penulis,
                                    penulis.nama as nama
                                    FROM post 
                                    JOIN penulis 
                                    WHERE post.idpenulis = penulis.idpenulis 
                                    ORDER BY post.tgl_update DESC 
                                    LIMIT 3");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_all_post()
    {
        $query = $this->db->query("SELECT post.idpost as idpost, 
                                    post.judul as judul, post.idkategori as idkategori, 
                                    post.isi_post as isi_post, 
                                    post.file_gambar as gambar_post, 
                                    post.tgl_insert as tgl_insert, 
                                    post.tgl_update as tgl_update, 
                                    penulis.file_gambar as gambar_penulis,
                                    penulis.nama as nama
                                FROM post JOIN penulis WHERE post.idpenulis = penulis.idpenulis ORDER BY post.tgl_update DESC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_all_kategori()
    {
        $query = $this->db->query("SELECT * FROM kategori");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_by_kategori($key)
    {
        $query = $this->db->query("SELECT * FROM post WHERE idkategori = $key ORDER BY tgl_update DESC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function seacrh($key)
    {
        $query = $this->db->query("SELECT * FROM post WHERE judul LIKE '%$key%'");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_detail($idpost)
    {
        $this->db->select('post.idpost as idpost, 
                            post.judul as judul, post.idkategori as idkategori, 
                            post.isi_post as isi_post, 
                            post.file_gambar as gambar_post, 
                            post.tgl_insert as tgl_insert, 
                            post.tgl_update as tgl_update, 
                            penulis.file_gambar as gambar_penulis,
                            penulis.nama as nama');
        $this->db->from('post');
        $this->db->join('penulis', 'post.idpenulis = penulis.idpenulis');
        $this->db->where('idpost', $idpost);

        return $this->db->get();
    }
}
