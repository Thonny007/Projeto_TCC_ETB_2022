<?php
    include "../controler/valida_login.php" 
 ?>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Menu_entrada.css">    
    <script type="text/javascript" src="../css/bootstrap/bootstrap.min.js" defer></script>

</head>
<div class="container-fluid">
<header>
    <style>
        /*imagem de fundo*/
        body {
            background-image: url('../img/fundo1.jpg');
        }

    </style>
<?php        
    if($_SESSION['adm']){
        ?>    

    <div id="menu">
        <div class="logo_entrada">
            <table>    
            <tr>
                <td>
                    <h1>
                        <a href="../administrador_servive/administracao.php">
                            <img  src="../img/logo1.png">
                            DITE.TATTOO
                        </a>
                    </h1>
                </td>
                <td width="20%" class="sair">
                    <p> Olá <?php echo $_SESSION["nome"]; ?></p>
                    <a href="../controler/logout.php">                     
                        SAIR <!-- <img src="" alt="logout"> -->
                    </a>
                </td>
            </tr>
            </table>
        </div>
        <div class="lista_menu">
        <strong>    
                <ul>
                    <!-- <li>
                        <a href="controler/logout.php"><span data-tooltip="Volta para a Página Principal e Fecha a Sessão automaticamente">Home-Page</span>  </a>
                    </li> -->
                    <li>
                        <a href="../administrador_servive/administracao.php"> Administração </a>
                    </li>
                    <li>
                        <a href="../login.php"> LOGIN </a>
                    </li>
                </ul>
            </strong>
        </div>
            <?php
} else {
?>
 <div id="menu">
        <div class="logo_entrada">
            <table>    
            <tr>
                <td>
                    <h1>
                        <a href="../cliente-pages/adm_cliente.php">
                            <img  src="../img/logo1.png">
                            DITE.TATTOO
                        </a>
                    </h1>
                </td>
                <td width="20%" class="sair">
                    <p> Olá <?php echo $_SESSION["nome"]; ?></p>
                    <a href="../controler/logout.php">                     
                        SAIR <!-- <img src="" alt="logout"> -->
                    </a>
                </td>
            </tr>
            </table>
        </div>
        <div class="lista_menu">    
  <strong>    
                <ul>
                    <li>
                        <a href="../controler/logout.php">Home-Page</a>
                    </li>
                    <li>
                        <a href="../cliente-pages/adm_cliente.php"> Administração </a>
                    </li>
                    <li>
                        <a href="../login.php"> LOGIN </a>
                    </li>
                </ul>
            </strong>      
<?php
}
?>
        </div>
    </div>
</header>
</div>