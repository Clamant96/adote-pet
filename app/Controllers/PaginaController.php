<?php

/* ROTEAMENTO PARA DIRECINAR AS PAGINAS DE CADA ITEM DO MENU */
class PaginaController extends Controller {

    public function __construct() {
        $this->categoriaModel = $this->model('Categoria');
        $this->postagemModel = $this->model('Postagem');
        $this->usuarioModel = $this->model('Usuario');
    }

    public function home() {
        $conteudo = [
            'postagem' => $this->postagemModel->findAllPostagens()
        ];

        $this->view('page/home', $conteudo);
    }

    public function colabore() {
        $this->view('page/colabore');
    }

    public function blog() {
        $this->view('page/blog');
    }

    public function adotar() {
        $this->view('page/adotar');
    }

    public function perfil($id) {
        $conteudo = [
            'usuario' => $this->usuarioModel->findByUsuarioId($id)
        ];

        $this->view('user/perfil', $conteudo);
    }

    public function login() {
        $conteudo = [
            'email' => '',
            'senha' => '',
            'preencha_email' => '',
            'preencha_senha' => ''
        ];

        $this->view('user/login', $conteudo);
    }

    public function cadastrar() {
        $conteudo = [
            'nome' => '',
            'email' => '',
            'celular' => '',
            'img' => '', 
            'senha' => '',
            'confirmar_senha' => '',
            'preencha_nome' => '',
            'preencha_email' => '',
            'preencha_celular' => '',
            'preencha_img' => '',
            'preencha_senha' => '',
            'preencha_confirmar_senha' => ''
        ];

        $this->view('user/cadastrar', $conteudo);
    }

}