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
            background-image: url('img/fundo.png');
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
                <td width="13%" class="sair">
                    <p> Olá Ditte.Tattoo <?php/*  include "controler/valida_login.php" */ ?></p>
                    <a href="controler/logout.php">
                     
                        SAIR 
                    </a>
                </td>
            </tr>
            </table>
        </div>
        <div class="lista_menu">
            <ul>
                <li>
                    <a href="cadastro.php"> Cadastro </a>
                </li>
                <li>
                    <a href="agendamento.php"> Agendamento </a>
                </li>
                <!-- <li>
                    <a href="orçamento.php"> Orçamento </a>
                </li> -->
                <li>
                    <a href="desenhos.php"> Portfólio </a>
                </li>
                <li>
                    <nav>
                        <a href="#rodape_1" href="rodape.php"> Contato/Rede Sociais </a>
                    </nav>
                </li>
                <li>
                    <a href="login.php"> LOGIN </a>
                </li>
            </ul>
        </div>
    </div>
</header>
</div>