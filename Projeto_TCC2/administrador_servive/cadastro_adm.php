<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../css/texto.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="../css/bootstrap/bootstrap.min.js" defer></script>
    <title> Cadastro.Administrador.Dite.Tattoo </title>
    <style>
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
    <?php include "../menus/menu_entrada.php" ?>
    <div class="fomulario_cadastro">
        <button id='btn_mostrar' type="button" class="btn btn-dark">
            <a href="lista_adm.php"> Listar Administradores </a>
        </button>
        <form method="POST" action="../controler/processa_cadastro_adm.php">
            <h3> Cadastro de Administrador </h3>

            <p>
                Nome do Adm:
                <input id="nome" type="text" name="nome" required>
            </p>
            <p>
                LOGIN:
                <input id="login" type="text" name="login" placeholder="EX: abcd@123" required>
            </p>
            <p>
                SENHA:
                <input id="senha" type="password" name="senha" placeholder="mínimo 6(seis Caracteres)" required>
            </p>
            <button class="btn btn-light" id="cadastrar" type="submit" nome="cadastrar" value="Cadastrar Administrador">
                <b>CADASTRAR ADMINISTRADOR</b>
            </button>
        </form>
    </div>
    </body>
</div>

</html>