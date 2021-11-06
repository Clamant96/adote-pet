<section>
    <div class="cadastro-login-usuario">
        <form action="<?=URL?>/UsuarioController/cadastrar" method="POST">
            <h1><?= APP_NOME ?></h1>
            <label for="nome">
                <input type="text" name="nome" placeholder="Nome" value="<?=$conteudo['nome']?>" id="<?= $conteudo['preencha_nome'] ? 'invalido' : '' ?>" />
                <p class="<?= $conteudo['preencha_nome'] ? 'feedback' : 'none' ?>">
                    <?= $conteudo['preencha_nome'] ?>
                </p>
            </label>
            <label for="email">
                <input type="text" name="email" placeholder="E-mail" value="<?=$conteudo['email']?>" id="<?= $conteudo['preencha_email'] ? 'invalido' : '' ?>" />
                <p class="<?= $conteudo['preencha_email'] ? 'feedback' : 'none' ?>">
                    <?= $conteudo['preencha_email'] ?>
                </p>
            </label>
            <label for="celular">
                <input type="text" name="celular" placeholder="11999999999" value="<?=$conteudo['celular']?>" id="<?= $conteudo['preencha_celular'] ? 'invalido' : '' ?>" />
                <p class="<?= $conteudo['preencha_celular'] ? 'feedback' : 'none' ?>">
                    <?= $conteudo['preencha_celular'] ?>
                </p>
            </label>
            <label for="img">
                <input type="text" name="img" placeholder="IMG" value="<?=$conteudo['img']?>" id="<?= $conteudo['preencha_img'] ? 'invalido' : '' ?>" />
                <p class="<?= $conteudo['preencha_img'] ? 'feedback' : 'none' ?>">
                    <?= $conteudo['preencha_img'] ?>
                </p>
            </label>
            <label for="senha">
                <input type="password" name="senha" placeholder="Senha" value="<?=$conteudo['senha']?>" id="<?= $conteudo['preencha_senha'] ? 'invalido' : '' ?>" />
                <p class="<?= $conteudo['preencha_senha'] ? 'feedback' : 'none' ?>">
                    <?= $conteudo['preencha_senha'] ?>
                </p>
            </label>
            <label for="confirme-senha">
                <input type="password" name="confirmar_senha" placeholder="Confirmar senha" value="<?=$conteudo['confirmar_senha']?>" id="<?= $conteudo['preencha_confirmar_senha'] ? 'invalido' : '' ?>" />
                <p class="<?= $conteudo['preencha_confirmar_senha'] ? 'feedback' : 'none' ?>">
                    <?= $conteudo['preencha_confirmar_senha'] ?>
                </p>
            </label>
            <div class="botoes">
                <button type="submit">Cadastrar-se</button>
                <p>
                    Ja tem um cadastro? <a href="<?=URL?>/user/login" >Faça login</a>
                </p>
            </div>
        </form>
    </div>
</section>