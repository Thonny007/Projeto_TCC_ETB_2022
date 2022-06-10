<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css">

    <title> Adminitração.Dite.Tattoo </title>
</head>
<div class="container-fluid">
    <body>
    <?php include "../controler/valida_login.php" ?>
    <?php include "../menus/menu_entrada.php" ?>
    <div id="adm_lista">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="procura_cliente.php">Procurar Cliente</a>
            </li>
            <li>
                <a href="adm_cadastra_clt.php"> Cadastrar Cliente </a>
            </li>
            <li>
                <a href="lista_cadastro.php"> Listar Cadastros </a>
            </li>
            <li>
                <a href="lista_agendamentos.php"> Listar Agendamentos </a>
            </li>
            <li>
                <a href="cadastro_adm.php"> Cadastrar Administrador</a>
            </li>
            <li>
                <a href="lista_adm.php"> Listar Administradores </a>
            </li>
            <li>
                <a href="altera_adm.php?id="> Alterar Meus Dados</a>
            </li>
        </ul>
    </div>
    </div>
    </body>
</div>