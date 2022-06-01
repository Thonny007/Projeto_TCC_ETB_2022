<?php
    require_once "../classes/Administrador.php";

    $adm = new Administrador();

    if ($adm->atender($_GET['id'])){
        echo "<script> alert('sucesso'); </script>";
    }else {
        echo "<script> alert('fracasso'); </script>";
    }