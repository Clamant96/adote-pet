<?php

class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'mvc';
    private $porta = '3306';
    private $dbh;
    private $stmt;

    public function __construct() {
        //fonte de dados ou DNS contem as informacoes necessarias para conectar ao banco de dados
        $dsn = 'mysql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
        $opcoes = [
            //armazena em cache a conexao para ser reutilizada, evita a sobrecarga de uma nova conexao, resultando em um aplicativo mais rapido
            PDO::ATTR_PERSISTENT => true,
            //lanca uma PDOException se ocorrer um erro
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            //cria a instancia do PDO
            $this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);
        
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();

        }
    }

    //Prepared Statements com query
    public function query($sql) {
        //prepara uma consulta sql
        $this->stmt = $this->dbh->prepare($sql);
    }

    //vincula um valor a um parametro
    public function bind($parametro, $valor, $tipo = null) {
        if(is_null($tipo)):
            switch(true):
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                break;
                default:
                    $tipo = PDO::PARAM_STR;
                break;
            endswitch;
        endif;

        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    //executa prepared statement
    public function executa() {
        return $this->stmt->execute();
    }

    //obtem um unico registro
    public function resultado() {
        $this->executa();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //obtem um conjunto de registros
    public function resultados() {
        $this->executa();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //retorna o numero de linhas afetadas pela ultima instrucao SQL
    public function totalResultados() {
        return $this->stmt->rowCount();
    }

    //retorna o ultimo ID inserido no banco de dados
    public function ultimoIdInserido() {
        return $this->dbh->lastInsertId();
    }
    
}