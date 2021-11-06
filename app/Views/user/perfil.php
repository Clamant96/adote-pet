<section>
    <div class="perfil-usuario">
        <div class="img">
            <img src="<?= $conteudo['usuario']->img ?>" alt="<?= $conteudo['usuario']->nome ?>">
        </div>
        <div class="dados-usuario">
            <p><strong>Nome:</strong> <?= $conteudo['usuario']->nome ?></p>
            <p><strong>E-mail:</strong> <?= $conteudo['usuario']->email ?></p>
            <p><strong>Cel.:</strong> <?= $conteudo['usuario']->celular ?></p>
        </div>
    </div>
</section>