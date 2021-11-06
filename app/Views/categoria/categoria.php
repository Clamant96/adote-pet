<section>
    <div class="categoria">
        <p class="paginacao" >
            <a href="<?= URL.'/page/home' ?>">Home </a>/ Categoria
        </p>
        <div class="painel-categoria">
            <p>Categoria<p>
            <form action="<?=URL?>/CategoriaController/cadastrar" method="POST">
                <label for="nome">
                    <input type="text" name="nome" placeholder="Nome" value="<?=$conteudo['nome']?>" id="<?= $conteudo['preencha_nome'] ? 'invalido' : '' ?>" />
                    <p class="<?= $conteudo['preencha_nome'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_nome'] ?>
                    </p>
                </label>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="categorias-existentes">
            <div class="container">
                <?php foreach($conteudo['categorias'] as $categoria): ?>
                <div class="nome">
                    <?= $categoria->nome ?>
                </div>
                <div class="botoes">
                    <a href="<?= URL.'/PaginaController/editarCategoria/'.$categoria->id ?>" class="editar" >Editar</a>
                    <a href="<?= URL.'/CategoriaController/excluir/'.$categoria->id ?>" class="excluir" >Excuir</a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>