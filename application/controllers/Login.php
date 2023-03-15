<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function index()
    {
        $data['titulo'] = "Titulo da Pagina";
        $data['subtitulo'] = "Subtitulo da Pagina";


        $this->load->view('includes/html_header', $data);
        $this->load->view('nova_pagina');
        $this->load->view('includes/html_footer');
    }
}