<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function getUsersList(){
        $this->db->from('usuarios');

        $result = $this->db->get()->result();

        return $result;
    }
}
?>


