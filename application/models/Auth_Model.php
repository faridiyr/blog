<?php

class Auth_Model extends CI_Model
{


    function construct()
    {
        parent::__construct();
    }

    function cek_user_data_admin($email, $password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        return $this->db->get();
    }

    function cek_user_data_penulis($email, $password)
    {
        $this->db->select('*');
        $this->db->from('penulis');
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        return $this->db->get();
    }
}
