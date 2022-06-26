<?php
    require_once "../classes/Administrador.php";

    $adm = new Administrador();

    if ($adm->atender($_GET['id'], $_GET['id_clt'])){
        echo "<script> alert('☺☺ SUCESSO ☺☺'); </script>";
        echo "<script> location.href = '../administrador_servive/lista_agendamentos.php'; </script>";
    }else {
        echo "<script> alert('⚠️⚠️ ERRO ⚠️⚠️'); </script>";
        echo "<script> location.href = '../administrador_servive/lista_agendamentos.php'; </script>";
    }