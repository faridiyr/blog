<?php

class Dashboard_Model extends CI_Model
{


    function construct()
    {
        parent::__construct();
    }

    function get_total_kategori()
    {
        $query = $this->db->query("SELECT * FROM kategori");

        $count = $query->num_rows();

        return $count;
    }

    function get_total_penulis()
    {
        $query = $this->db->query("SELECT * FROM penulis");

        $count = $query->num_rows();

        return $count;
    }

    function get_total_post()
    {
        $query = $this->db->query("SELECT * FROM post");

        $count = $query->num_rows();

        return $count;
    }

    function get_total_post_penulis($key)
    {
        $query = $this->db->query("SELECT * FROM post WHERE idpenulis = $key");

        $count = $query->num_rows();

        return $count;
    }

    public function getCountPostPerCat()
    {
        $query = $this->db->query("SELECT kategori.idkategori, nama, COUNT(post.idkategori) AS frekuensi FROM kategori LEFT JOIN post ON kategori.idkategori = post.idkategori GROUP BY kategori.idkategori ORDER BY kategori.idkategori");
        $results = $query->result(); // mengembalikan semua nilai hasil query dalam bentuk object
        return $results;
    }
}
