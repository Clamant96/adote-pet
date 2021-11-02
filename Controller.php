<?php
/*
    * Controlador base
    * Carrega os modelos e as views
*/
class Controller {
    //carrega os modelos
    public function model($model) {
        //requere o arquivo de modelo
        require_once '../app/Models/'.$model.'.php';
        //instancia o modelo
        return new $model;
    }

    //carrega as views
    public function view($view, $dados = []) {
        $arquivo = ('../app/Views/'.$view.'.php');
        if(file_exists($arquivo)):
            //requere o arquivo de view
            require_once $arquivo;

        else:
            // a funcao die() termina a execucao do script, caso nao seja localizado a view
            die('O arquivo de view nao foi localizado');

        endif;
    }
}