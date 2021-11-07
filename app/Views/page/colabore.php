<?php
    if(!isset($_SESSION['usuario_id'])) {
        header('Location: '.URL.'/user/login');
    }
?>
<section>Pagina - Colabore</section>