<?php
    include_once "../classes/cliente.php";
    
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $data_nasc = $_POST["data_nasc"]; 
    $telefone = $_POST["telefone"];
    
    $cliente = new Cliente ($nome, $login, $senha,$data_nasc,$telefone);

    $cliente->update($id);
?>