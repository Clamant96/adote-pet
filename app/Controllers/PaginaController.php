<?php

/* ROTEAMENTO PARA DIRECINAR AS PAGINAS DE CADA ITEM DO MENU */
class PaginaController extends Controller {

    public function __construct() {
        $this->categoriaModel = $this->model('Categoria');
        $this->postagemModel = $this->model('Postagem');
        $this->usuarioModel = $this->model('Usuario');
    }

    /* PAGINA HOME / INDEX */
    public function home() {
        $conteudo = [
            'postagens' => $this->postagemModel->findAllPostagens(),
            'categorias' => $this->categoriaModel->findAllCategorias(),
            'nome' => '',
            'preencha_nome' => '',
        ];

        $this->view('page/home', $conteudo);
    }

    /* PAGINA COLABORE */
    public function colabore() {
        $this->view('page/colabore');
    }

    /* PAGINA BLOG */
    public function blog() {
        $this->view('page/blog');
    }

    /* PAGINA ABORTAR */
    public function adotar() {
        $this->view('page/adotar');
    }

    /* PAGINA PERFIL USUARIO */
    public function perfil($id) {
        $conteudo = [
            'usuario' => $this->usuarioModel->findByUsuarioId($id)
        ];

        $this->view('user/perfil', $conteudo);
    }

    public function postagem() {
        $conteudo = [
            'nome' => '', 
            'sexo' => '', 
            'idade' => '', 
            'porte' => '', 
            'endereco' => '', 
            'data_postagem' => '', 
            'historia' => '', 
            'img' => '', 
            'disponibilidade' => '', 
            'id_usuario' => '', 
            'id_categoria' => '',
            'preencha_nome' => '', 
            'preencha_sexo' => '', 
            'preencha_idade' => '', 
            'preencha_porte' => '', 
            'preencha_endereco' => '', 
            'preencha_data_postagem' => '', 
            'preencha_historia' => '', 
            'preencha_img' => '', 
            'preencha_disponibilidade' => '', 
            'preencha_id_usuario' => '', 
            'preencha_id_categoria' => '',
            'categorias' => $this->categoriaModel->findAllCategorias(),
            'postagens' => $this->postagemModel->findByIdUsuario($_SESSION['usuario_id'])
        ];

        $this->view('postagem/postagem', $conteudo);
    }

    /* PAGINA CATEGORIA */
    public function categoria() {
        $conteudo = [
            'nome' => '',
            'preencha_nome' => '',
            'categorias' => $this->categoriaModel->findAllCategorias()
        ];

        $this->view('categoria/categoria', $conteudo);
    }

    /* PAGINA CATEGORIA ID */
    public function editarCategoria($id) {
        $categoriaID = $this->categoriaModel->findByIdCategoria($id);

        $conteudo = [
            'id' => $categoriaID->id,
            'nome' => $categoriaID->nome,
            'preencha_nome' => '',
            'categoria' => $this->categoriaModel->findByIdCategoria($id)
        ];

        $this->view('categoria/editar-categoria', $conteudo);
    }

    /* PAGINA LOGIN */
    public function login() {
        $conteudo = [
            'email' => '',
            'senha' => '',
            'preencha_email' => '',
            'preencha_senha' => ''
        ];

        $this->view('user/login', $conteudo);
    }

    /* PAGINA CADASTRO */
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