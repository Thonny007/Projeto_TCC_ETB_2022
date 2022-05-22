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
        include_once "classes/Agendamento.php";

        $adm = new Agendamentos();
        $listar = $adm->list(true);
    ?>

    <?php include "menu_entrada.php"; ?>
    <button class="btn btn-dark">
        <a href="lista_agendamentos.php">Agendamentos em Espera</a>
    </button>
    <button class="btn btn-dark">
        <a href="lista_agendamentos_confirmados.php">Agendamentos Confirmados</a>
    </button>
    <table id="lista_cadastro" class="table mt-3 table-hover">
        <thead>
        <tr>
            <td>Data Agend</td>
            <td>Img Referencia</td>
            <td>status Agend</td>
            <td>Descrição Tattoo</td>
            <td>nome do cliente</td>

        </tr>
        </thead>
        <?php
        while ($registro = mysqli_fetch_row($listar)) {
            ?>
            <tr>
                <td><?php echo Agendamentos::formataData($registro[1]); ?></td>
                <td>
                    ver foto
                    <a id="lupa" href="mostra_foto.php?id=<?php echo $registro[0]; ?>">
                        <img src="css/icons/lupa.svg" alt="icone lupa">
                    </a>
                </td>
                <td><?php echo $registro[2]; ?></td>
                <td><textarea class="edit_box" cols="20" rows="0.5" style="height:30px;width:80%"
                              disabled><?php echo $registro[3]; ?> </textarea></td>
                <td><?php echo $registro[4]; ?></td>
                <td class="acoes">
                </td>
            </tr>
        <?php } ?>
        <tfoot></tfoot>
    </table>
</div>
</body>
</html>
</div>