<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('usuarios_model');
    }

    public function index()
    {
        $data['titulo'] = "Titulo da Pagina";
        $data['subtitulo'] = "Subtitulo da Pagina";

        $data['users'] = $this->login_model->getUsersList();

        $this->load->view('includes/html_header', $data);
        $this->load->view('usuarios');
        $this->load->view('includes/html_footer');
    }

    public function novoUsuario(){

        $dados['nome'] = $this->input->post('nome');
        $dados['login'] = $this->input->post('login');
        $dados['senha'] = $this->input->post('senha');
        $dados['papel'] = $this->input->post('papel');
        $dados['ativo'] = intval($this->input->post('ativo'));

        $retorno = $this->usuarios_model->novoUsuario($dados);
        
        $this->output->set_output($retorno);
    }

}