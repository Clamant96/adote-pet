<?php

class Sessao {
    public static function mensagem($nome, $texto = null, $classe = null) {
        if(!empty($nome)):
            if(!empty($texto) && empty($_SESSION[$nome])):
                if(!empty($_SESSION[$nome])): 
                    unset($_SESSION[$nome]);
                endif;

                $_SESSION[$nome] = $texto;
                $_SESSION[$nome.'classe'] = $classe;
                
                elseif(!empty($_SESSION[$nome]) && empty($texto)):
                    $classe = !empty($_SESSION[$nome.'classe']) ? $_SESSION[$nome.'classe'] : 'alertaSucesso';
                    echo '
                        <div id="'.$classe.'">
                            <p>'.$_SESSION[$nome].'</p>
                        </div>
                    ';

                    unset($_SESSION[$nome]);
                    unset($_SESSION[$nome.'classe']);  
            endif;
        endif;
    }

    public static function usuarioLogado() {
        //se nao tiver usuario ID logado, sera redirecionado para a pagina de login
        if(!isset($_SESSION['usuario_id'])):
            return true;
        else:
            return false;
        endif;
    }

}