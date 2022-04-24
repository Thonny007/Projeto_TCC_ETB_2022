<?php
    include_once "../classes/cliente.php";
    
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $data_nasc = $_POST["data_nasc"]; 
    $telefone = $_POST["telefone"];
    
    $cliente = new Cliente ($nome, $data_nasc, $telefone,$senha, $login);

    
    echo 
    "
    <p>id: $id</p>
    <p>nome: $nome</p>
    <p>login: $login</p>
    <p>senha: $senha</p>
    <p>data: $data_nasc</p>
    <p>telefone: $telefone</p>
    ";
    
    $cliente->update($id);

?>