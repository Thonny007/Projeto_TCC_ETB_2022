<?php 
    session_start();

    include_once "classes/Administrador.php";

    $lista = Administrador::getMyAgnds($_SESSION['id']);

    while ($teste = mysqli_fetch_row($lista)) {
        print_r($teste);

        echo "<br><br><br>";
    }
