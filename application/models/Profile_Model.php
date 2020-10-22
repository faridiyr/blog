<?php

class Profile_Model extends CI_Model
{


    function construct()
    {
        parent::__construct();
    }

    function get_data_penulis_session($idpenulis)
    {
        $this->db->select('*');
        $this->db->from('penulis');
        $this->db->where('idpenulis', $idpenulis);

        return $this->db->get();
    }

    function get_data_admin_session($idadmin)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('idadmin', $idadmin);

        return $this->db->get();
    }

    function get_password_penulis($id)
    {
        $this->db->select('password');
        $this->db->from('penulis');
        $this->db->where('idpenulis', $id);

        return $this->db->get();
    }

    function get_password_admin($id)
    {
        $this->db->select('password');
        $this->db->from('admin');
        $this->db->where('idadmin', $id);

        return $this->db->get();
    }
}
