<?php

class UsuarioController extends Controller {

    public function __construct() {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar() {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($formulario)):
            $conteudo = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'celular' => trim($formulario['celular']),
                'senha' => trim($formulario['senha']),
                'confirmar_senha' => trim($formulario['confirmar_senha'])
            ];

            if(in_array('', $formulario)):

                if(empty($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'Preencha o campo <b>Nome</b>';
                else:
                    $conteudo['preencha_nome'] = ''; 
                endif;

                if(empty($formulario['email'])):
                    $conteudo['preencha_email'] = 'Preencha o campo <b>E-mail</b>';
                else:
                    $conteudo['preencha_email'] = ''; 
                endif;

                if(empty($formulario['celular'])):
                    $conteudo['preencha_celular'] = 'Preencha o campo <b>Celular</b>';
                else:
                    $conteudo['preencha_celular'] = ''; 
                endif;

                if(empty($formulario['senha'])):
                    $conteudo['preencha_senha'] = 'Preencha o campo <b>Senha</b><br>A senha deve ter no minimo 6 caracteres';
                else:
                    $conteudo['preencha_senha'] = ''; 
                endif;

                if(empty($formulario['confirmar_senha'])):
                    $conteudo['preencha_confirmar_senha'] = 'Preencha o campo <b>Senha</b>';
                else:
                    $conteudo['preencha_confirmar_senha'] = ''; 
                endif;

            else:
                if(Checa::checarNome($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'O nome informado e invalido';

                elseif(Checa::checarEmail($formulario['email'])):
                    $conteudo['preencha_email'] = 'O email informado e invalido';

                elseif(Checa::checarCelular($formulario['celular'])):
                    $conteudo['preencha_celular'] = 'O celular informado e invalido';

                //verifica se o email ja existe no banco de conteudo
                //chama o contrutor Usuarios
                //instancia a classe Usuario
                //compara o $formulario['email'] dentro do metodo checarEmail()
                elseif($this->usuarioModel->validaEmail($formulario['email'])):
                    $conteudo['preencha_email'] = 'O email informado ja se encontra cadastrado';

                elseif(strlen($formulario['senha']) < 6):
                    $conteudo['preencha_senha'] = 'A senha deve ter no minimo 6 caracteres';
                
                elseif($formulario['senha'] != $formulario['confirmar_senha']):
                    $conteudo['preencha_confirmar_senha'] = 'As senhas são diferentes';

                else:
                    $conteudo['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);
                    
                    //e aqui que se insere os conteudo no banco de conteudo
                    //chama chama o contrutor Usuarios
                    //instancia a classe Usuario
                    //armazena do $conteudo dentro do metodo armazenar()
                    if($this->usuarioModel->postUsuario($conteudo)):
                        Sessao::mensagem('usuario', 'Cadastro realizado com sucesso');
                        Url::redirecionar('paginaController/login');

                    else:
                        die("Erro ao armazenar usuario no banco de conteudo");

                    endif;
                
                endif;
                
            endif;

            /*var_dump($formulario);*/
        else:
            $conteudo = [
                'nome' => '',
                'email' => '',
                'celular' => '',
                'senha' => '',
                'confirmar_senha' => '',
                'preencha_nome' => '',
                'preencha_email' => '',
                'preencha_celular' => '',
                'preencha_senha' => '',
                'preencha_confirmar_senha' => ''
            ];
            
        endif;

        $this->view('user/cadastrar', $conteudo);
    }

    public function login() {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        if(isset($formulario)):
            $conteudo = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha'])
            ];

            if(in_array('', $formulario)):

                if(empty($formulario['email'])):
                    $conteudo['preencha_email'] = 'Preencha o campo <b>E-mail</b>';
                else:
                    $conteudo['preencha_email'] = ''; 
                endif;

                if(empty($formulario['senha'])):
                    $conteudo['preencha_senha'] = 'Preencha o campo <b>Senha</b><br>A senha deve ter no minimo 6 caracteres';
                else:
                    $conteudo['preencha_senha'] = ''; 
                endif;

            else:
                if(Checa::checarEmail($formulario['email'])):
                    $conteudo['preencha_email'] = 'O email informado e invalido';

                elseif(strlen($formulario['senha']) < 6):
                    $conteudo['preencha_senha'] = 'A senha deve ter no minimo 6 caracteres';

                else:
                    $usuario = $this->usuarioModel->loginUsuario($formulario['email'], $formulario['senha']);
                    
                    if($usuario):
                        $this->criarSessaoUsuario($usuario);
                        
                        /*var_dump($usuario);
                        echo '<hr>';*/
                    else:
                        Sessao::mensagem('usuario', 'Usuario ou senha invalidos', 'alertaErro');
                    
                    endif;

                endif;
                
            endif;

            // var_dump($formulario);

        else:
            $conteudo = [
                'email' => '',
                'senha' => '',
                'preencha_email' => '',
                'preencha_senha' => ''
            ];
            
        endif;

        $this->view('user/login', $conteudo);
    }

    private function criarSessaoUsuario($usuario) {
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;
        $_SESSION['usuario_celular'] = $usuario->celular;
        $_SESSION['usuario_senha'] = $usuario->senha;

        Url::redirecionar('paginaController/home');

    }

    public function logout() {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);
        unset($_SESSION['usuario_celular']);
        unset($_SESSION['usuario_senha']);

        session_destroy();

        Url::redirecionar('usuarioController/login');

    }

    public function editar($id) {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $conteudo = [
                'id' => $id,
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'celular' => trim($formulario['celular']),
                'senha' => trim($formulario['senha'])
            ];

            if(in_array('', $formulario)):

                if(empty($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'Preencha o campo <b>Nome</b>';
                else:
                    $conteudo['preencha_nome'] = ''; 
                endif;

                if(empty($formulario['email'])):
                    $conteudo['preencha_email'] = 'Preencha o campo <b>E-mail</b>';
                else:
                    $conteudo['preencha_email'] = ''; 
                endif;

                if(empty($formulario['celular'])):
                    $conteudo['preencha_celular'] = 'Preencha o campo <b>Celular</b>';
                else:
                    $conteudo['preencha_celular'] = ''; 
                endif;

                if(empty($formulario['senha'])):
                    $conteudo['preencha_senha'] = 'Preencha o campo <b>Senha</b><br>A senha deve ter no minimo 6 caracteres';
                else:
                    $conteudo['preencha_senha'] = ''; 
                endif;

            else:
                if(Checa::checarNome($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'O nome informado e invalido';

                elseif(Checa::checarEmail($formulario['email'])):
                    $conteudo['preencha_email'] = 'O email informado e invalido';

                elseif(Checa::checarCelular($formulario['celular'])):
                    $conteudo['preencha_celular'] = 'O celular informado e invalido';

                elseif(strlen($formulario['senha']) < 6):
                    $conteudo['preencha_senha'] = 'A senha deve ter no minimo 6 caracteres';

                else:
                    $conteudo['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);
                    
                    if($this->usuarioModel->putUsuario($conteudo)):
                        Sessao::mensagem('usuario', 'conteudo alterados com sucesso');
                        Url::redirecionar('usuarios/logout');
                    else:
                        die("Erro ao armazenar usuario no banco de conteudo");

                    endif;
                
                endif;
                
            endif;

            /*var_dump($formulario);*/
        else:
            $alterar = $this->usuarioModel->findByUsuarioId($id);

            if($alterar->id != $_SESSION['usuario_id']):
                Sessao::mensagem('usuario', 'Voce nao tem autorizacao para editar esse perfil');
                Url::redirecionar('usuariosController/login');

            endif;

            $conteudo = [
                'id' => $alterar->id,
                'nome' => $alterar->nome,
                'email' => $alterar->email,
                'celular' => $alterar->celular,
                'senha' => $alterar->senha,
                'preencha_nome' => '',
                'preencha_email' => '',
                'preencha_celular' => '',
                'preencha_senha' => ''
            ];
            
        endif;

        $this->view('user/perfil', $conteudo);
    }

    //RECEBE OS VALORES DA MENSAGEM PARA PODER MOSTRAR SEPADAS POR PERFIL
    public function vizualizarPerfil($id) {
        
        $conteudo = [
            'usuario' => $this->usuarioModel->findByUsuarioId($id)
        ];

        $this->view('user/perfil', $conteudo);
    }

    public function excluir($id) {
        if($this->usuarioModel->deleteUsuario($id)):
            Sessao::mensagem('usuario', 'Usuario excluido com sucesso');
            //Url::redirecionar('usuarios/login');
            $this->logout();

        else:
            die("Erro ao excluir o produto");
            
        endif;

    }

}