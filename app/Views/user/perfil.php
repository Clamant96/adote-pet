<section>
    <div class="perfil-usuario">
        <div class="img">
            <img src="<?= $_SESSION['usuario_img'] ?>" alt="<?= $_SESSION['usuario_img'] ?>">
        </div>
        <div class="dados-usuario">
            <p><strong>Nome:</strong> <?= $_SESSION['usuario_nome'] ?></p>
            <p><strong>E-mail:</strong> <?= $_SESSION['usuario_email'] ?></p>
            <p><strong>Cel.:</strong> <?= $_SESSION['usuario_celular'] ?></p>
        </div>
    </div>
</section>