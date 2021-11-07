<section>
    <div class="ver-postagem">
        <div class="animal-focus">
            <div class="img" style="background-image: url(<?= $conteudo['postagem']->img ?>);">
            </div>
            <div class="dados-animal">
                <div class="nome-e-categoria-animal">
                    <h2><?= $conteudo['postagem']->nome ?></h2>
                    <p><?= $conteudo['categoria']->nome ?> | <?= $conteudo['postagem']->sexo ?> | <?= $conteudo['postagem']->porte ?> | <?= $conteudo['postagem']->idade ?> anos</p>
                </div>
                <div class="endereco-publicado-por">
                    <div class="dados">
                        <div class="icone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                        </div>
                        <p>Está em <?= $conteudo['postagem']->endereco ?></p>
                    </div>
                    <div class="dados">
                        <div class="icone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                        <p>Publicado por <a href="<?= URL.'/UsuarioController/vizualizarPerfil/'.$conteudo['postagem']->id_usuario ?>"><?= $conteudo['usuario']->nome ?></a> em <?= date("Y-m-d", strtotime($conteudo['postagem']->data_postagem)); ?></p>
                    </div>
                    <div class="historia">
                        <?php if($conteudo['postagem']->sexo == 'macho'): ?>
                            <p><strong>Historia do <?= $conteudo['postagem']->nome ?>: </strong><?= $conteudo['postagem']->historia ?></p>
                        <?php elseif($conteudo['postagem']->sexo == 'femea'): ?>
                            <p><strong>Historia da <?= $conteudo['postagem']->nome ?>: </strong><?= $conteudo['postagem']->historia ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="dados-responsavel"> 
                        <p><strong>Responsavel: </strong> <?= $conteudo['usuario']->nome ?></p>
                        <p><strong>E-mail: </strong> <?= $conteudo['usuario']->email ?></p>
                        <p><strong>Ce.: </strong> <?= $conteudo['usuario']->celular ?></p>
                    </div>
                    <div class="adotar">
                        <?php if(isset($_SESSION['usuario_id'])): ?>
                        <a href="#">Adotar</a>
                        <a href="#">Contribuir</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>