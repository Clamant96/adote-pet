<?php
/*
    * autoload - Responsavel pelo carregamento automatico das classes
*/

//a funcao spl_autoload_register() registra qualquer numero de autoloaders, permitindo que calsses e interfaces sejam automaticamente carregadas
spl_autoload_register(function ($classe) {
    //lista de diretorios para buscar as classes - sempre que criar uma nova classe, a adicione aqui, assim nao tem necessidade de ficar chamando ela constantemente
    $diretorio = [
        'Libraries',
        'Helpers'
    ];
    //percorre os diretorios em busca das classes
    foreach($diretorio as $diretorio):
        //a constante __DIR__ retorna o diretorio do arquivo
        //DIRECTORY_SEPARETOR e o separador utilizado para percorrer diretorios
        $arquivo = (__DIR__.DIRECTORY_SEPARATOR.$diretorio.DIRECTORY_SEPARATOR.$classe.'.php');
        //verifica se o arquivo de classe existe
        if(file_exists($arquivo)):
            //inclui o arquivo de classe
            require_once $arquivo;
        endif;
    endforeach;
});