<?php

class Postagem {
    private $conexao; // VARIAVEL PARA ARMZENAR OS DADOS DE CONEXAO COM O BANCO DE DADOS

    /* INSTANCIA UMA NOVA CONEXAO COM O BANCO DE DADOS */
    public function __construct() {
        $this->conexao = new Database();

    }

    /* GET ALL POSTAGENS */
    public function findAllPostagens() {
        $this->conexao->query("SELECT * FROM postagem");
        
        return $this->conexao->resultados();
    }

    /* GET BY ID POSTAGEM */
    public function findByIdPostagem($id) {
        $this->conexao->query("SELECT * FROM postagem WHERE id = :id");
        $this->conexao->bind('id', $id); 

        return $this->conexao->resultado();
    }

    /* POST POSTAGEM */
    public function postPostagem($dados) {
        $this->conexao->query("INSERT INTO postagem(nome, sexo, idade, porte, endereco, data_postagem, historia, img, disponibilidade) VALUES (:nome, :sexo, :idade, :porte, :endereco, :data_postagem, :historia, :img, :disponibilidade)");
        
        $this->conexao->bind("nome", $dados['nome']);
        $this->conexao->bind("sexo", $dados['sexo']);
        $this->conexao->bind("idade", $dados['idade']);
        $this->conexao->bind("porte", $dados['porte']);
        $this->conexao->bind("endereco", $dados['endereco']);
        $this->conexao->bind("data_postagem", $dados['data_postagem']);
        $this->conexao->bind("historia", $dados['historia']);
        $this->conexao->bind("img", $dados['img']);
        $this->conexao->bind("disponibilidade", $dados['disponibilidade']);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* PUT POSTAGEM */
    public function putPostagem($dados) {
        $this->conexao->query("UPDATE postagem SET nome = :nome, sexo = :sexo, idade = :idade, porte = :porte, endereco = :endereco, data_postagem = :data_postagem, historia = :historia, img = :img, disponibilidade = :disponibilidade WHERE id = :id");
        
        $this->conexao->bind("id", $dados['id']);
        $this->conexao->bind("nome", $dados['nome']);
        $this->conexao->bind("sexo", $dados['sexo']);
        $this->conexao->bind("idade", $dados['idade']);
        $this->conexao->bind("porte", $dados['porte']);
        $this->conexao->bind("endereco", $dados['endereco']);
        $this->conexao->bind("data_postagem", $dados['data_postagem']);
        $this->conexao->bind("historia", $dados['historia']);
        $this->conexao->bind("img", $dados['img']);
        $this->conexao->bind("disponibilidade", $dados['disponibilidade']);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* DELETE POSTAGEM */
    public function deletePostagem($id) {
        $this->conexao->query("DELETE FROM postagem WHERE id = :id");
        
        $this->conexao->bind("id", $id);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* SERVICE VALIDA NOME NO BANCO DE DADOS */
    public function validaNome($nome) {
        $this->conexao->query("SELECT nome FROM postagem WHERE nome = :nome");
        
        $this->conexao->bind(":nome", $nome);

        if($this->conexao->resultado()):
            return true;
        else:
            return false;
        endif;
    }

}