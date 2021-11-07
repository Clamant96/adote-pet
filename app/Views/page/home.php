<?php
    $idCategoria = 'Categorias';

    if(isset($_POST["nome"])){
        $idCategoria=$_POST["nome"];
        //echo "select nome is => ".$idCategoria;
    }
?>
<section>
    <div class="animais-para-adocao">
        <div class="pesquisa-animal">
            <input type="search" placeholder="Pesquisar...">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        <div class="select-animais">
            <p><a href="<?= URL.'/PaginaController/categoria' ?>">Nova categoria</a><p>
            <h2>Selecionar tipo</h2>
            <form method="POST" action="">
                <select name="nome" onchange="this.form.submit()" >
                    <option value="" disabled selected><?= $idCategoria ?></option>
                    <option value="Todas" >Todas</option>
                    <?php foreach($conteudo['categorias'] as $categoria): ?>
                        <option value="<?= $categoria->id ?>">
                            <?= $categoria->nome ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </form>
        </div>
        <!-- NAO ESQUECER QUE AGORA PRECISAMOS CRIAR O COMPONENTE DE POSTAGENS E INCLUIR O IF, PARA QUANDO A OPCAO DO SELECT FOR SELECIONADA FILTRAR SOMENTE OS DADOS DA CATEGORIA DETERMINADA NO SELECT PELO USUARIO -->
        <div class="animal-doacao">
            <?php foreach($conteudo['postagens'] as $postagem): ?>
                <?php if($postagem->id_categoria == $idCategoria || $idCategoria == 'Categorias' || $idCategoria == 'Todas'): ?>
                <div id="modalAnimal" class="container">
                    <a href="<?= URL.'/PostagemController/verPostagem/'.$postagem->id?>" class="img" style="background-image: url(<?= $postagem->img ?>);"> 
                    </a>
                    <div class="conteudo">
                        <h2><?= $postagem->nome ?></h2>
                        <p><?= $postagem->endereco ?></p>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
    </div>
</section>

<!-- MODAL / VIEW POSTAGEM ID -->
<div id="modalFindByIdAnimal" class="modal">

    <!-- CONTEUDO DO MODAL -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="animal-focus">
            <div class="img" style="background-image: url(https://cdn.amigonaosecompra.com.br/1176x0/9c04f6ea-621a-4ba0-b97d-0161e0659730/47e56845-b1c6-4798-9ae0-1b25eda14347/47e56845-b1c6-4798-9ae0-1b25eda14347.jpeg?v=63803108619);">
            </div>
            <div class="dados-animal">
                <div class="nome-e-categoria-animal">
                    <h2>Frufru linda</h2>
                    <p>Cachorro | Macho | Filhote | Porte pequeno</p>
                </div>
                <div class="endereco-publicado-por">
                    <div class="dados">
                        <div class="icone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                        </div>
                        <p>Está em São Paulo, São Paulo</p>
                    </div>
                    <div class="dados">
                        <div class="icone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                        <p>Publicado por <a href="#">Maria Lucia Lopes</a> em 04/11/2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>