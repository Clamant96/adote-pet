<header>
    <div class="header">
        <div class="img">
            <img src="<?= URL ?>/img/logo-adote-pet.png" alt="<?= APP_NOME ?>" />
        </div>
        <nav>
            <div class="menu">
                <a href="<?= URL.'/page/home' ?>">Home</a>
                <a href="<?= URL.'/page/colabore' ?>">Colabore</a>
                <a href="<?= URL.'/page/blog' ?>">Blog</a>
                <a href="<?= URL.'/user/perfil' ?>">Meu Perfil</a>
                <a href="<?= URL.'/page/adotar' ?>" class="quero-adotar">Quero adota</a>
            </div>
        </nav>
        <?php if(isset($_SESSION['usuario_id'])): ?>
            <div class="login-cadastro">
                <a href="<?= URL.'/UsuarioController/vizualizarPerfil/'.$_SESSION['usuario_id'] ?>" >
                <img src="<?= $_SESSION['usuario_img'] ?>" alt="<?= $_SESSION['usuario_img'] ?>">
                </a>
                <a href="<?= URL.'/UsuarioController/logout' ?>" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                </a>
            </div>
        <?php else: ?>
            <div class="login-cadastro">
                <a href="<?= URL.'/user/login' ?>">Entrar</a>
                <a href="<?= URL.'/user/cadastrar' ?>" class="cadastro">Cadastre-se</a>
            </div>
        <?php endif; ?>
    </div>
</header>