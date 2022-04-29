<?php include "controler/valida_login.php" ?>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/Menu_entrada.css">    
    <script type="text/javascript" src="css/bootstrap/bootstrap.min.js" defer></script>

</head>
<div class="container-fluid">
<header>
    <style>
        /*imagem de fundo*/
        body {
            background-image: url('img/fundo1.jpg');
        }
    </style>
    <div id="menu">
        <div class="logo_entrada">
            <table>    
            <tr>
                <td>
                    <h1>
                        <a href="index.php">
                            <img  src="img/logo1.png">
                            DITTE.TATTOO
                        </a>
                    </h1>
                </td>
                <td width="20%" class="sair">
                    <p> Olá <?php echo $_SESSION["nome"]; ?></p>
                    <a href="controler/logout.php">                     
                        SAIR 
                    </a>
                </td>
                <td><!--  Gato para o nome não passar a tela -->
                    <p style="opacity:0%;">a</p>
                </td>
            </tr>
            </table>
        </div>
        <div class="lista_menu">
            <strong>    
                <ul>
                    <li>
                        <a href="adm_cliente.php"> Administração </a>
                    </li>
                    <li>
                        <a href="agendamento.php"> Agendamento </a>
                    </li>
                    <li>
                        <a href="login.php"> LOGIN </a>
                    </li>
                </ul>
            </strong>    
        </div>
    </div>
</header>
</div>