<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .carrega-imagem{
            max-width: 1000px;
            max-height: 1000px;
            margin: auto;
            margin-top: 50px;
            text-align: center;
        }
        
        .carrega-imagem img{
            max-width: 100%;
        }
    </style>
</head>
<body>
    <?php
    /*----------------------------------- LOGO MENU ----------------------------------- */
        include "menu_entrada.php";    
    include "controler/valida_login.php";
        require_once "classes/Agendamento.php";

        $agnd = Agendamentos::getById($_GET['id'], true);
        $foto = $agnd->getImg();
    ?>
    <div class="carrega-imagem">
        <img src="controler/<?php echo $foto[0]; ?>" alt="foto_exemplo"/>
    </div>
    <button>
        <a href="controler/<?php echo $foto[0]?>" download>download</a>
    </button>
</body>
</html>
