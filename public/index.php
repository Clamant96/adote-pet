<?php
ob_start();

session_start();
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

include './../app/configuracao.php';
include './../app/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NOME ?></title>
    <link rel="stylesheet" href="<?=URL?>/public/css/style.css" />
    <link rel="shortcut icon" href="<?= URL ?>/img/logo-adote-pet.png" type="image/x-icon">
</head>
<body>
    <?php
        include '../app/Views/header.php';
        $rotas = new Rota();
        include '../app/Views/footer.php';
    ?>
    <script src="<?=URL?>/public/js/javascript.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>