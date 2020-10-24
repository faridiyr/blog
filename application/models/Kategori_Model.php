<?php

class Kategori_Model extends CI_Model
{


    function construct()
    {
        parent::__construct();
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

    function delete_kategori($idkategori)
    {
        $this->db->where('idkategori', $idkategori);
        $this->db->delete('kategori');
    }

    function get_pie_kategori()
    {
        $query = $this->db->query("SELECT * FROM kategori");
        $result = $query->result();


        return $result;
    }
}
