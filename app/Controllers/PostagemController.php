<?php

class PostagemController extends Controller {

    public function __construct() {
        $this->postagemModel = $this->model('Postagem');
        $this->usuarioModel = $this->model('Usuario');
        $this->categoriaModel = $this->model('Categoria');
    }

    public function cadastrar() {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($formulario)):
            $conteudo = [
                'nome' => trim($formulario['nome']),
                'sexo' => trim($formulario['sexo']),
                'idade' => trim($formulario['idade']),
                'porte' => trim($formulario['porte']),
                'endereco' => trim($formulario['endereco']),
                'data_postagem' => trim($formulario['data_postagem']),
                'historia' => trim($formulario['historia']),
                'img' => trim($formulario['img']),
                'disponibilidade' => trim($formulario['disponibilidade']),
                'id_usuario' => $_SESSION['usuario_id'],
                'id_categoria' => trim($formulario['id_categoria'])
            ];

            /* IF -> CASO O FORMULARIO ESTEJA VAZIO */
            if(in_array('', $formulario)):
                
                if(empty($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'Preencha o campo <b>Nome</b>';
                else:
                    $conteudo['preencha_nome'] = ''; 
                endif;

                if(empty($formulario['sexo'])):
                    $conteudo['preencha_sexo'] = 'Preencha o campo <b>Sexo</b>';
                else:
                    $conteudo['preencha_sexo'] = ''; 
                endif;

                if(empty($formulario['idade'])):
                    $conteudo['preencha_idade'] = 'Preencha o campo <b>Idade</b>';
                else:
                    $conteudo['preencha_idade'] = ''; 
                endif;

                if(empty($formulario['porte'])):
                    $conteudo['preencha_porte'] = 'Preencha o campo <b>Porte</b>';
                else:
                    $conteudo['preencha_porte'] = ''; 
                endif;

                if(empty($formulario['endereco'])):
                    $conteudo['preencha_endereco'] = 'Preencha o campo <b>Endereco</b>';
                else:
                    $conteudo['preencha_endereco'] = ''; 
                endif;

                if(empty($formulario['data_postagem'])):
                    $conteudo['preencha_data_postagem'] = 'Preencha o campo <b>Data Postagem</b>';
                else:
                    $conteudo['preencha_data_postagem'] = ''; 
                endif;

                if(empty($formulario['historia'])):
                    $conteudo['preencha_historia'] = 'Preencha o campo <b>Historia</b>';
                else:
                    $conteudo['preencha_historia'] = ''; 
                endif;

                if(empty($formulario['img'])):
                    $conteudo['preencha_img'] = 'Preencha o campo <b>IMG</b>';
                else:
                    $conteudo['preencha_img'] = ''; 
                endif;

                if(empty($formulario['disponibilidade'])):
                    $conteudo['preencha_disponibilidade'] = 'Preencha o campo <b>Disponibilidade</b>';
                else:
                    $conteudo['preencha_disponibilidade'] = ''; 
                endif;

            else:
                if(Checa::checarNome($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'O nome informado e invalido';

                else:
                    //e aqui que se insere os conteudo no banco de conteudo
                    //chama chama o contrutor Usuarios
                    //instancia a classe Usuario
                    //armazena do $conteudo dentro do metodo armazenar()
                    if($this->postagemModel->postPostagem($conteudo)):
                        Sessao::mensagem('postagem', 'Cadastro realizado com sucesso');
                        Url::redirecionar('PaginaController/home');

                    else:
                        die("Erro ao armazenar usuario no banco de conteudo");

                    endif;
                
                endif;
                
            endif;

            //var_dump($formulario);

        else:
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
                'preencha_id_categoria' => ''
            ];
            
        endif;

        $this->view('postagem/postagem', $conteudo);
    }

    public function editar($id) {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $conteudo = [
                'id' => $id,
                'nome' => trim($formulario['nome']),
                'sexo' => trim($formulario['sexo']),
                'idade' => trim($formulario['idade']),
                'porte' => trim($formulario['porte']),
                'endereco' => trim($formulario['endereco']),
                'data_postagem' => trim($formulario['data_postagem']),
                'historia' => trim($formulario['historia']),
                'img' => trim($formulario['img']),
                'disponibilidade' => trim($formulario['disponibilidade']),
                'id_usuario' => trim($formulario[$_SESSION['usuario_id']]),
                'id_categoria' => trim($formulario['id_categoria'])
            ];

            if(in_array('', $formulario)):

                if(empty($formulario['sexo'])):
                    $conteudo['preencha_sexo'] = 'Preencha o campo <b>Sexo</b>';
                else:
                    $conteudo['preencha_sexo'] = ''; 
                endif;

                if(empty($formulario['idade'])):
                    $conteudo['preencha_idade'] = 'Preencha o campo <b>Idade</b>';
                else:
                    $conteudo['preencha_idade'] = ''; 
                endif;

                if(empty($formulario['porte'])):
                    $conteudo['preencha_porte'] = 'Preencha o campo <b>Porte</b>';
                else:
                    $conteudo['preencha_porte'] = ''; 
                endif;

                if(empty($formulario['endereco'])):
                    $conteudo['preencha_endereco'] = 'Preencha o campo <b>Endereco</b>';
                else:
                    $conteudo['preencha_endereco'] = ''; 
                endif;

                if(empty($formulario['data_postagem'])):
                    $conteudo['preencha_data_postagem'] = 'Preencha o campo <b>Data Postagem</b>';
                else:
                    $conteudo['preencha_data_postagem'] = ''; 
                endif;

                if(empty($formulario['historia'])):
                    $conteudo['preencha_historia'] = 'Preencha o campo <b>Historia</b>';
                else:
                    $conteudo['preencha_historia'] = ''; 
                endif;

                if(empty($formulario['img'])):
                    $conteudo['preencha_img'] = 'Preencha o campo <b>IMG</b>';
                else:
                    $conteudo['preencha_img'] = ''; 
                endif;

                if(empty($formulario['disponibilidade'])):
                    $conteudo['preencha_disponibilidade'] = 'Preencha o campo <b>Disponibilidade</b>';
                else:
                    $conteudo['preencha_disponibilidade'] = ''; 
                endif;

            else:
                if(Checa::checarNome($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'O nome informado e invalido';

                else:
                    
                    if($this->postagemModel->putPostagem($conteudo)):
                        Sessao::mensagem('postagem', 'conteudo alterados com sucesso');
                        Url::redirecionar('PaginaController/home');
                        
                    else:
                        die("Erro ao armazenar usuario no banco de conteudo");

                    endif;
                
                endif;
                
            endif;

            /*var_dump($formulario);*/
        else:
            $alterar = $this->postagemModel->findByIdPostagem($id);

            if($alterar->id_usuario != $_SESSION['usuario_id']):
                Sessao::mensagem('postagem', 'Voce nao tem autorizacao para editar esse perfil');
                Url::redirecionar('PaginaController/postagem');

            endif;

            $conteudo = [
                'id' => $alterar->id,
                'nome' => $alterar->nome, 
                'sexo' => $alterar->sexo, 
                'idade' => $alterar->idade, 
                'porte' => $alterar->porte, 
                'endereco' => $alterar->endereco, 
                'data_postagem' => $alterar->data_postagem, 
                'historia' => $alterar->historia, 
                'img' => $alterar->img, 
                'disponibilidade' => $alterar->disponibilidade, 
                'id_usuario' => $alterar->id_usuario, 
                'id_categoria' => $alterar->id_categoria,
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
                'preencha_id_categoria' => ''
            ];
            
        endif;

        $this->view('postagem/editar-postagem', $conteudo);
    }

    //RECEBE OS VALORES DA MENSAGEM PARA PODER MOSTRAR SEPADAS POR PERFIL
    public function vizualizarPostagem($id) {
        
        $conteudo = [
            'postagem' => $this->postagemModel->findByIdPostagem($id)
        ];

        $this->view('postagem/visualizar-postagem', $conteudo);
    }

    public function excluir($id) {
        if($this->postagemModel->deletePostagem($id)):
            Sessao::mensagem('postagem', 'Postagem excluida com sucesso');
            Url::redirecionar('PaginaController/home');

        else:
            die("Erro ao excluir o produto");
            
        endif;

    }

    /* PAGINA VISUALIZAR POSTAGEM POR ID */
    public function verPostagem($id) {
        $dadosPostagem = $this->postagemModel->findByIdPostagem($id);

        $conteudo = [
            'postagem' => $dadosPostagem,
            'usuario' => $this->usuarioModel->findByUsuarioId($dadosPostagem->id_usuario),
            'categoria' => $this->categoriaModel->findByIdCategoria($dadosPostagem->id_categoria)
        ];

        $this->view('postagem/ver-postagem', $conteudo);
    }
    
}