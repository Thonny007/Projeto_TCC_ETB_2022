<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver_foto_angd.Ditte.Tattoo</title>
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
     
        
        button a{
            text-decoration: none;
            color:white;
        }
        button a:hover{
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<div class="container-fluid">
<body>
    <?php
        include "menu_entrada.php";    
        include "controler/valida_login.php";
        require_once "classes/Agendamento.php";

        $agnd = Agendamentos::getById($_GET['id'], true);
        $foto = $agnd->getImg();
    ?>
    <button  class="btn btn-dark">
        <a href="lista_agendamentos.php">Agendamentos</a>
    </button>

    <button class="btn btn-dark">
        <a href="lista_agendamentos_excluidos.php">Listar Agendamentos Cancelados</a>
    </button>
    <button class="btn btn-dark">
        <a href="lista_agendamentos_confirmados.php">Agendamentos Confirmados</a>
    </button>
    <p></p>
    <div class="carrega-imagem">
        <a>
            <img src="controler/<?php echo $foto[0]; ?>" alt="foto_exemplo"/>
        </a>

        <button type="button" class="btn btn-secondary">
            <a href="controler/<?php echo $foto[0]; ?>" download>
                DOWNLOAD
            </a>
        </button>
    </div>
</body>
    </div>
</html>
