<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="css/menu_entrada.css">
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/lista_agendamentos.css">
    <title> Lista.agnd.Ditte.Tattoo </title>
    <style>
        body {
            width: 100%;
        }
    </style>
</head>
<div class="container-fluid">
    <body>
    <?php
        include_once "classes/Administrador.php";
        include_once 'classes/Agendamento.php';

        $adm = Administrador::getById($_SESSION['id'], true);
        $listar = $adm->getMyAgnds();
    ?>

    <?php include "menu_entrada.php"; ?>
    <button class="btn btn-dark">
        <a href="lista_agendamentos.php">Agendamentos</a>
    </button>

    <button class="btn btn-dark">
        <a href="lista_agendamentos_excluidos.php">Listar Agendamentos Cancelados</a>
    </button>
    <table id="lista_cadastro" class="table mt-3 table-hover">
        <thead>
            <td>Data Agend</td>
            <td>Img Referencia</td>
            <td>status Agend</td>
            <td>Descrição Tattoo</td>
            <td>nome do cliente</td>
        </thead>
        <tbody>
        <?php while ($registro = mysqli_fetch_row($listar)) { ?>
            <tr>
                <td><?php echo Agendamentos::formataData($registro[1]); ?></td>
                <td>
                    ver foto
                    <a id="lupa" href="mostra_foto.php?id=<?php echo $registro[0]; ?>">
                        <img src="css/icons/lupa.svg" alt="icone lupa">
                    </a>
                </td>
                <td><?php echo $registro[2]; ?></td>
                <td><textarea class="edit_box" cols="20" rows="0.5" style="height:30px;width:80%" disabled><?php echo $registro[3];?> </textarea> </td>
                <td><?php echo $registro[4]; ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot></tfoot>
    </table>
</div>
</body>
</html>
</div>