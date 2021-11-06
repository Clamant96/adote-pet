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
        <div class="login-cadastro">
            <a href="<?= URL.'/user/login' ?>">Entrar</a>
            <a href="<?= URL.'/user/cadastrar' ?>" class="cadastro">Cadastre-se</a>
        </div>
    </div>
</header>