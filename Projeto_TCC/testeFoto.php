<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "classes/Agendamento.php";

        $agnd = Agendamentos::getById(33, true);
        $foto = $agnd->getImg();

        $path = "controler/$foto[0]";
        $path = str_replace(" ", "%20", $path);
    ?>
    <img src="<?php echo $path; ?>" alt="">
    <p>caminho eraado: <?php echo $path; ?></p>
    <br>
    <br>
    <br>
    <br>
    <img src="controler/imgs_atendimento/1652391920Captura%20de%20tela%202022-04-01%20133436.png" alt="">
    <p>caminho certo: controler/imgs_atendimento/1652391648Captura%20de%20tela%202022-04-01%20133436.png</p>
</body>
</html>

