<section>
    <div class="cadastro-login-usuario">
        <form action="<?=URL?>/UsuarioController/login" method="POST">
            <h1><?= APP_NOME ?></h1>
            <label for="email">
                <input type="text" name="email" placeholder="E-mail" value="<?=$conteudo['email']?>" id="<?= $conteudo['preencha_email'] ? 'invalido' : '' ?>" />
                <p class="<?= $conteudo['preencha_email'] ? 'feedback' : 'none' ?>">
                    <?= $conteudo['preencha_email'] ?>
                </p>
            </label>
            <label for="senha">
                <input type="password" name="senha" placeholder="Senha" value="<?=$conteudo['senha']?>" id="<?= $conteudo['preencha_senha'] ? 'invalido' : '' ?>" />
                <p class="<?= $conteudo['preencha_senha'] ? 'feedback' : 'none' ?>">
                    <?= $conteudo['preencha_senha'] ?>
                </p>
            </label>
            <div class="botoes">
                <button type="submit">Login</button>
                <p>
                    Ja tem um cadastro? <a href="<?=URL?>/user/cadastrar" >Faça login</a>
                </p>
            </div>
        </form>
    </div>
</section>