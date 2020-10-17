<?php

class Post_Model extends CI_Model
{


    function construct()
    {
        parent::__construct();
    }

    function get_post_recent()
    {
        $query = $this->db->query("SELECT * 
                                    FROM post 
                                    ORDER BY tgl_update DESC
                                    LIMIT 3
                                    ");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_all_post()
    {
        $query = $this->db->query("SELECT * 
                                    FROM post 
                                    ORDER BY tgl_update DESC
                                    ");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function get_all_kategori()
    {
        $query = $this->db->query("SELECT * 
                                    FROM kategori 
                                    ");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }
}
