<?php
    session_start();
    include_once "../classes/cliente.php";

    if(strlen($_POST["senha"]) < 6){
        echo "<script>
                alert ('⚠️ Sua senha teve ter no minimo 6(seis) caracteres ⚠️')
                location.href = ('/Projeto_TCC2/altera_clt.php')
            </script>";
    }else{
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $data_nasc = $_POST["data_nasc"];
        $telefone = $_POST["telefone"];
        $cliente = new Cliente ($id, $nome, $data_nasc, $telefone,$senha, $login);

        $cliente->update($_SESSION['adm']);
    }
    
?>