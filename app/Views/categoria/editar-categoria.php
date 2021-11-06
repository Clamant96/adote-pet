<section>
    <div class="categoria">
        <p class="paginacao" >
            <a href="<?= URL.'/categoria/categoria' ?>">Categoria </a>/ <?= $conteudo['categoria']->nome ?>
        </p>
        <div class="painel-categoria">
            <p>Editar categoria<p>
            <form action="<?=URL.'/CategoriaController/editar/'.$conteudo['categoria']->id ?>" method="POST">
                <label for="nome">
                    <input type="text" name="nome" placeholder="Nome" value="<?=$conteudo['nome']?>" id="<?= $conteudo['preencha_nome'] ? 'invalido' : '' ?>" />
                    <p class="<?= $conteudo['preencha_nome'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_nome'] ?>
                    </p>
                </label>
                <button type="submit">Atualizar</button>
            </form>
        </div>
    </div>
</section>