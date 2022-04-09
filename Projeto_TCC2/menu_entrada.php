<head>

    <link rel="stylesheet" type="text/css" href="css/Menu_entrada.css">
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="css/bootstrap/bootstrap.min.js" defer></script>

</head>

<header>
    <style>
        /*imagem de fundo*/
        body {
            background-image: url('img/fundo.png');
        }
    </style>

    <div class="container-fluid">
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
            <td>
                <p> Olá <?php include "controler/valida_login.php" ?></p>
            </td>
        </tr>
        
        </table>
        </div>
        <div class="lista_menu">
            <ul>
                <li>
                    <a href="cadastro.php"> XXX Cadastro </a>
                </li>
                <li>
                    <a href="agendamento.php"> Agendamento </a>
                </li>
                <li>
                    <a href="orçamento.php"> Orçamento </a>
                </li>
                <li>
                    <a href="desenhos.php"> Desenhos </a>
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