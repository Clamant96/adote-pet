<section>
    <div class="postagem">
        <div class="painel-postagem">
            <p>Postagem<p>
            <form action="<?=URL?>/PostagemController/cadastrar" method="POST">
                <label for="nome">
                    <input type="text" name="nome" placeholder="Nome" value="<?=$conteudo['nome']?>" id="<?= $conteudo['preencha_nome'] ? 'invalido' : '' ?>" />
                    <p class="<?= $conteudo['preencha_nome'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_nome'] ?>
                    </p>
                </label>
                <label for="sexo">
                    <select name="sexo" value="<?=$conteudo['sexo']?>" id="<?= $conteudo['preencha_sexo'] ? 'invalido' : '' ?>" >
                        <option value="" disabled selected>Sexo</option>
                        <option value="macho">Macho</option>
                        <option value="femea">Femea</option>
                    </select>
                    <p class="<?= $conteudo['preencha_sexo'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_sexo'] ?>
                    </p>
                </label>
                <label for="idade">
                    <input type="number" name="idade" placeholder="Idade" value="<?=$conteudo['idade']?>" id="<?= $conteudo['preencha_idade'] ? 'invalido' : '' ?>" />
                    <p class="<?= $conteudo['preencha_idade'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_idade'] ?>
                    </p>
                </label>
                <label for="porte">
                    <select name="porte" value="<?=$conteudo['porte']?>" id="<?= $conteudo['preencha_porte'] ? 'invalido' : '' ?>" >
                        <option value="" disabled selected>Porte</option>
                        <option value="pequeno">Pequeno</option>
                        <option value="medio">Medio</option>
                        <option value="grande">Grande</option>
                    </select>
                    <p class="<?= $conteudo['preencha_porte'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_porte'] ?>
                    </p>
                </label>
                <label for="endereco">
                    <input type="text" name="endereco" placeholder="Endereço" value="<?=$conteudo['endereco']?>" id="<?= $conteudo['preencha_endereco'] ? 'invalido' : '' ?>" />
                    <p class="<?= $conteudo['preencha_endereco'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_endereco'] ?>
                    </p>
                </label>
                <label for="data_postagem">
                    <input type="date" name="data_postagem" placeholder="Data Postagem" value="<?=$conteudo['data_postagem']?>" id="<?= $conteudo['preencha_data_postagem'] ? 'invalido' : '' ?>" />
                    <p class="<?= $conteudo['preencha_data_postagem'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_data_postagem'] ?>
                    </p>
                </label>
                <label for="historia">
                    <textarea type="text" name="historia" placeholder="Historia" value="<?=$conteudo['historia']?>" id="<?= $conteudo['preencha_historia'] ? 'invalido' : '' ?>" ></textarea>
                    <p class="<?= $conteudo['preencha_historia'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_historia'] ?>
                    </p>
                </label>
                <label for="img">
                    <input type="text" name="img" placeholder="Link IMG" value="<?=$conteudo['img']?>" id="<?= $conteudo['preencha_img'] ? 'invalido' : '' ?>" />
                    <p class="<?= $conteudo['preencha_img'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_img'] ?>
                    </p>
                </label>
                <label for="id_categoria">
                    <select name="id_categoria" value="<?=$conteudo['id_categoria']?>" id="<?= $conteudo['preencha_id_categoria'] ? 'invalido' : '' ?>" >
                        <?php foreach($conteudo['categorias'] as $categoria): ?>
                            <option value="<?= $categoria->id ?>">
                                <?= $categoria->nome ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </label>
                <label for="disponibilidade">
                    <select name="disponibilidade" value="<?=$conteudo['disponibilidade']?>" id="<?= $conteudo['preencha_disponibilidade'] ? 'invalido' : '' ?>" >
                        <option value="" disabled selected>Status</option>
                        <option value="0">Disponível</option>
                        <option value="1">Doado</option>
                    </select>
                    <p class="<?= $conteudo['preencha_disponibilidade'] ? 'feedback' : 'none' ?>">
                        <?= $conteudo['preencha_disponibilidade'] ?>
                    </p>
                </label>
                <button type="submit">Publicar</button>
            </form>
        </div>
        <div class="minhas-postagem">
            <p class="titulo-minhas-postagens">Minhas Postagens<p>
            <?php foreach($conteudo['postagens'] as $postagem): ?>
                <div class="novo-item">
                    <a href="<?= URL.'/PostagemController/verPostagem/'.$postagem->id ?>"><?= $postagem->nome ?></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>