<?php

class Categoria {
    private $conexao; // VARIAVEL PARA ARMZENAR OS DADOS DE CONEXAO COM O BANCO DE DADOS

    /* INSTANCIA UMA NOVA CONEXAO COM O BANCO DE DADOS */
    public function __construct() {
        $this->conexao = new Database();

    }

    /* GET ALL CATEGORIAS */
    public function findAllCategorias() {
        $this->conexao->query("SELECT * FROM categoria");
        
        return $this->conexao->resultados();
    }

    /* GET BY ID CATEGORIA */
    public function findByIdCategoria($id) {
        $this->conexao->query("SELECT * FROM categoria WHERE id = :id");
        $this->conexao->bind('id', $id); 

        return $this->conexao->resultado();
    }

    /* POST CATEGORIA */
    public function postCategoria($dados) {
        $this->conexao->query("INSERT INTO categoria(nome) VALUES (:nome)");
        
        $this->conexao->bind("nome", $dados['nome']);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* PUT CATEGORIA */
    public function putCategoria($dados) {
        $this->conexao->query("UPDATE categoria SET nome = :nome WHERE id = :id");
        
        $this->conexao->bind("id", $dados['id']);
        $this->conexao->bind("nome", $dados['nome']);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* DELETE CATEGORIA */
    public function deleteCategoria($id) {
        $this->conexao->query("DELETE FROM categoria WHERE id = :id");
        
        $this->conexao->bind("id", $id);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* SERVICE VALIDA NOME CATEGORIA NO BANCO DE DADOS */
    public function validaNomeCategoria($nome) {
        $this->conexao->query("SELECT nome FROM categoria WHERE nome = :nome");
        
        $this->conexao->bind(":nome", $nome);

        if($this->conexao->resultado()):
            return true;
        else:
            return false;
        endif;
    }

}