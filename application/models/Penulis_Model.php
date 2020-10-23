<?php

class Penulis_Model extends CI_Model
{


    function construct()
    {
        parent::__construct();
    }

    function get_all_penulis()
    {
        $query = $this->db->query("SELECT * FROM penulis");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function delete_penulis($idpenulis)
    {
        $this->db->where('idpenulis', $idpenulis);
        $this->db->delete('penulis');
    }
}
