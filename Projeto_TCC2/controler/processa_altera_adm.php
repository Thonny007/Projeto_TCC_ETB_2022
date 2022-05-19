<?php
    include_once "../classes/Administrador.php";
    
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $adm = new Administrador($id, $nome, $login, $senha);

    $adm->update();