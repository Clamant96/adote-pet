<?php
    if(!isset($_SESSION['usuario_id'])) {
        header('Location: '.URL.'/user/login');
    }
?>
<section>
    <div class="perfil-usuario">
        <div class="dados-perfil">
            <div class="img">
                <img src="<?= $conteudo['usuario']->img ?>" alt="<?= $conteudo['usuario']->nome ?>">
            </div>
            <div class="dados-usuario">
                <p><strong>Nome:</strong> <?= $conteudo['usuario']->nome ?></p>
                <p><strong>E-mail:</strong> <?= $conteudo['usuario']->email ?></p>
                <p><strong>Cel.:</strong> <?= $conteudo['usuario']->celular ?></p>
            </div>
        </div>
        <div class="animal-doacao">
            <?php foreach($conteudo['postagens'] as $postagem): ?>
                <div id="modalAnimal" class="container">
                    <a href="<?= URL.'/PostagemController/verPostagem/'.$postagem->id?>" class="img" style="background-image: url(<?= $postagem->img ?>);"> 
                    </a>
                    <div class="conteudo">
                        <h2><?= $postagem->nome ?></h2>
                        <p><?= $postagem->endereco ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>