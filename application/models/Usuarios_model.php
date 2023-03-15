<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{

    public function novoUsuario($dados){
        return $this->db->insert('usuarios', $dados);
    }
}
?>


