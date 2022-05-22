<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="css/bootstrap/bootstrap.min.js" defer></script>
    <title> Cadastrar_clt.Ditte.Tattoo </title>
    <style>
        button{
            margin:10% ;
            padding: 10%;
        }
        button a{
            text-decoration: none;
            color:white;
        }
        button a:hover{
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<div class="container-fluid">
    <body>
    <?php include "menu_entrada.php" ?>
        <button id='btn_mostrar' type="button" class="btn btn-dark">
                <a href="lista_cadastro.php">Listar Clientes Cadastrados </a>
            </button>
    <div class="fomulario_cadastro">
        <form method="POST" action="controler/processa_adm_cadastra_clt.php">
            <h3><u> CADASTRA USUÁRIOS </u></h3>
            <p>
                Nome Completo:
                <input id="nome" type="text" name="nome" required>
            </p>
            <p>
                Data de Nascimento:
                <input id="data_nasc" type="date" name="data_nasc" required>
            </p>
            <p>
                Telefone para Contado:
                <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxxxxxxx" required>
            </p>
            <p>
                LOGIN/Nome de Úsuario:
                <input id="login" type="text" name="login" placeholder="EX: abcd@123" required>
            </p>
            <p>
                SENHA:
                <input id="senha" type="password" name="senha" placeholder="mínimo 6(seis Caracteres)" required>
            </p>
            <!-- ENVIAR formulario -->
            <input id="cadastrar" type="submit" name="cadastrar" value="Cadastrar Usuário">
        </form>
    </div>
    </body>
</div>

</html>