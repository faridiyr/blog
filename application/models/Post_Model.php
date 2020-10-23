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
                                    post.judul as judul, 
                                    post.idkategori as idkategori, 
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
                                    post.judul as judul, 
                                    post.idkategori as idkategori, 
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
        $query = $this->db->query("SELECT post.idpost as idpost, 
                                    post.judul as judul, 
                                    post.idkategori as idkategori, 
                                    post.isi_post as isi_post, 
                                    post.file_gambar as gambar_post, 
                                    post.tgl_insert as tgl_insert, 
                                    post.tgl_update as tgl_update, 
                                    penulis.file_gambar as gambar_penulis,
                                    penulis.nama as nama
                                    FROM post JOIN penulis ON post.idpenulis = penulis.idpenulis WHERE post.idkategori = '$key' ORDER BY post.tgl_update DESC");

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
                            post.judul as judul, 
                            post.idkategori as idkategori, 
                            post.isi_post as isi_post, 
                            post.file_gambar as gambar_post, 
                            post.tgl_insert as tgl_insert, 
                            post.tgl_update as tgl_update,
                            post.idpenulis as idpenulis, 
                            penulis.file_gambar as gambar_penulis,
                            penulis.nama as nama,
                            kategori.nama as nama_kategori');
        $this->db->from('post');
        $this->db->join('penulis', 'post.idpenulis = penulis.idpenulis');
        $this->db->join('kategori', 'post.idkategori = kategori.idkategori');
        $this->db->where('idpost', $idpost);

        return $this->db->get();
    }

    function get_all_kategori_by_kategori($idkategori)
    {
        $query = $this->db->query("SELECT post.idpost as idpost, 
                                    post.judul as judul, post.idkategori as idkategori, 
                                    post.isi_post as isi_post, 
                                    post.file_gambar as gambar_post, 
                                    post.tgl_insert as tgl_insert, 
                                    post.tgl_update as tgl_update, 
                                    penulis.file_gambar as gambar_penulis,
                                    penulis.nama as nama
                                    FROM post JOIN penulis 
                                    WHERE post.idpenulis = penulis.idpenulis, 
                                    post.idkategori = $idkategori 
                                    ORDER BY post.tgl_update DESC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_all_post_by_penulis($idpenulis)
    {
        $query = $this->db->query("SELECT post.idpost as idpost, 
                                    post.judul as judul, 
                                    post.idkategori as idkategori, 
                                    post.isi_post as isi_post, 
                                    post.file_gambar as gambar_post, 
                                    post.tgl_insert as tgl_insert, 
                                    post.tgl_update as tgl_update, 
                                    post.idpenulis as idpenulis,
                                    kategori.nama as namakategori
                                    FROM post 
                                    JOIN penulis 
                                    ON post.idpenulis = penulis.idpenulis
                                    JOIN kategori
                                    ON post.idkategori = kategori.idkategori
                                    WHERE post.idpenulis = $idpenulis");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function delete_post($idpost)
    {
        $this->db->where('idpost', $idpost);
        $this->db->delete('post');
    }

    function select_post_by_id($idpost)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('kategori', 'kategori.idkategori = post.idkategori');
        $this->db->where('idpost', $idpost);

        return $this->db->get();
    }

    function get_total_post()
    {
        $query = $this->db->query("SELECT * FROM post");
        $count = $query->num_rows();

        return $count;
    }

    function get_total_comment_by_post($key)
    {
        $query = $this->db->query("SELECT * FROM komentar WHERE idpost = $key");
        $count = $query->num_rows();

        return $count;
    }

    function get_comment($key)
    {
        $query = $this->db->query("SELECT komentar.idkomentar as idkomentar, 
                                    komentar.idpost as idpost, 
                                    komentar.idpenulis as idpenulis, 
                                    komentar.isi as isi, 
                                    komentar.tgl_update as tgl_update, 
                                    penulis.nama as nama, 
                                    penulis.file_gambar as gambar
                                    FROM komentar 
                                    JOIN penulis 
                                    ON komentar.idpenulis = penulis.idpenulis
                                    WHERE komentar.idpost = $key");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function delete_komentar($idkomentar)
    {
        $this->db->where('idkomentar', $idkomentar);
        $this->db->delete('komentar');
    }
}
