<?php

class Usuario {
    private $conexao; // VARIAVEL PARA ARMZENAR OS DADOS DE CONEXAO COM O BANCO DE DADOS

    /* INSTANCIA UMA NOVA CONEXAO COM O BANCO DE DADOS */
    public function __construct() {
        $this->conexao = new Database();

    }

    /* GET ALL USUARIO */
    public function findAllUsuarios() {
        $this->conexao->query("SELECT * FROM usuario");
        
        return $this->conexao->resultados();
    }

    /* GET BY ID USUARIO */
    public function findByUsuarioId($id) {
        $this->conexao->query("SELECT * FROM usuario WHERE id = :id");
        $this->conexao->bind('id', $id);

        return $this->conexao->resultado();
    }

    /* POST USUARIO */
    public function postUsuario($dados) {
        $this->conexao->query("INSERT INTO usuario(nome, email, celular, senha) VALUES (:nome, :email, :celular, :senha)");
        
        $this->conexao->bind("nome", $dados['nome']);
        $this->conexao->bind("email", $dados['email']);
        $this->conexao->bind("celular", $dados['celular']);
        $this->conexao->bind("senha", $dados['senha']);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* PUT USUARIO */
    public function putUsuario($dados) {
        $this->conexao->query("UPDATE usuario SET nome = :nome, email = :email, celular = :celular, senha = :senha WHERE id = :id");
        
        $this->conexao->bind("id", $dados['id']);
        $this->conexao->bind("nome", $dados['nome']);
        $this->conexao->bind("email", $dados['email']);
        $this->conexao->bind("celular", $dados['celular']);
        $this->conexao->bind("senha", $dados['senha']);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* DELETE USUARIO */
    public function deleteUsuario($id) {
        $this->conexao->query("DELETE FROM usuario WHERE id = :id");
        
        $this->conexao->bind("id", $id);

        if($this->conexao->executa()):
            return true;
        else:
            return false;
        endif;
    }

    /* SERVICE LOGIN USUARIO */
    public function loginUsuario($email, $senha) {
        $this->conexao->query("SELECT * FROM usuario WHERE email = :email");

        $this->conexao->bind(":email", $email);

        if($this->conexao->resultado()):
            
            $resultado = $this->conexao->resultado();

            if(password_verify($senha, $resultado->senha)):
                return $resultado;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

    /* SERVICE VALIDA E-MAIL NO BANCO DE DADOS */
    public function validaEmail($email) {
        $this->conexao->query("SELECT email FROM usuario WHERE email = :email");
        
        $this->conexao->bind(":email", $email);

        if($this->conexao->resultado()):
            return true;
        else:
            return false;
        endif;
    }

}