<?php

class CategoriaController extends Controller {

    public function __construct() {
        $this->categoriaModel = $this->model('Categoria');
    }

    public function cadastrar() {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($formulario)):
            $conteudo = [
                'nome' => trim($formulario['nome'])
            ];

            /* IF -> CASO O FORMULARIO ESTEJA VAZIO */
            if(in_array('', $formulario)):
                
                if(empty($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'Preencha o campo <b>Nome</b>';
                else:
                    $conteudo['preencha_nome'] = ''; 
                endif;

            else:
                if(Checa::checarNome($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'O nome informado e invalido';

                else:
                    
                    if($this->categoriaModel->postCategoria($conteudo)):
                        Sessao::mensagem('categoria', 'Cadastro realizado com sucesso');
                        Url::redirecionar('PaginaController/home');

                    else:
                        die("Erro ao armazenar a categoria no banco de dados");

                    endif;
                
                endif;
                
            endif;

            //var_dump($formulario);

        else:
            $conteudo = [
                'nome' => '',
                'preencha_nome' => ''
            ];
            
        endif;

        $this->view('page/home', $conteudo);
    }

    public function editar($id) {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $conteudo = [
                'id' => $id,
                'nome' => trim($formulario['nome'])
            ];

            if(in_array('', $formulario)):

                if(empty($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'Preencha o campo <b>Nome</b>';
                else:
                    $conteudo['preencha_nome'] = ''; 
                endif;

            else:
                if(Checa::checarNome($formulario['nome'])):
                    $conteudo['preencha_nome'] = 'O nome informado e invalido';

                else:
                    
                    if($this->categoriaModel->putCategoria($conteudo)):
                        Sessao::mensagem('categoria', 'conteudo alterados com sucesso');
                        Url::redirecionar('categoria/categoria');
                        
                    else:
                        die("Erro ao armazenar a categoria no banco de dados");

                    endif;
                
                endif;
                
            endif;

            /*var_dump($formulario);*/

        else:
            $alterar = $this->categoriaModel->findByIdCategoria($id);

            $conteudo = [
                'id' => $alterar->id,
                'nome' => $alterar->nome,
                'nome' => '',
                'preencha_nome' => ''
            ];
            
        endif;

        $this->view('categoria/categoria', $conteudo);
    }

    //RECEBE OS VALORES DA MENSAGEM PARA PODER MOSTRAR SEPADAS POR PERFIL
    public function vizualizarPerfil($id) {
        
        $conteudo = [
            'categoria' => $this->categoriaModel->findByIdCategoria($id)
        ];

        $this->view('user/perfil', $conteudo);
    }

    public function excluir($id) {
        if($this->categoriaModel->deleteCategoria($id)):
            Sessao::mensagem('categoria', 'Categoria excluida com sucesso');
            //Url::redirecionar('page/home');

        else:
            die("Erro ao excluir o produto");
            
        endif;

        $conteudo = [
            'nome' => '',
            'preencha_nome' => '',
            'categorias' => $this->categoriaModel->findAllCategorias(),

        ];
        
        $this->view('categoria/categoria', $conteudo);
    }

}