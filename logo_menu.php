<?php
session_start();
?>
<head>

    <link rel="stylesheet" type="text/css" href="css/layout_Logo_Menu.css">
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="css/bootstrap/bootstrap.min.js" defer></script>

</head>

<header>
    <style>
        /*imagem de fundo*/
        body {
            background-image: url('img/fundo1.jpg');
        }
    </style>

    <div class="container-fluid">
        <div class="logo">
            <h1>
                <a href="controler/logout.php">
                    <img src="img/logo1.png" alt="imagem_logo">
                    DITE.TATTOO
                </a>
            </h1>
        </div>
        <div class="lista_menu">
            <strong>
                <ul class="aaa">
                    <li class="li">
                        <a href="controler/logout.php">
                            <span data-tooltip="Volta para a Página Principal">Home-Page</span>
                        </a>
                    </li>
                    <li><a href="cadastro.php"> Cadastro/Agendamento </a></li>
                    <li><a href="orçamento.php"> Orçamento </a></li>
                    <li><a href="desenhos.php"> Portfólio </a></li>
                    <li>
                        <nav><a href="#rodape_1"> Contato/Rede Sociais </a></nav>
                    </li>
                    <li><a href="login.php"> LOGIN </a></li>
                </ul>
            </strong>
        </div>
    </div>
</header>