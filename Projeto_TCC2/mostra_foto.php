<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            height: 100vh;
            width: 100vh;
        }
        .carrega-imagem{
            width: 800px;
            height: 500px;
            margin: auto;
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
        <a>
            <img src="controler/<?php echo $foto[0]; ?>" alt="foto_exemplo"/>
        </a>

        <button>
            <a href="controler/<?php echo $foto[0]; ?>" download>
                DOWNLOAD
            </a>
        </button>
    </div>
</body>
</html>
