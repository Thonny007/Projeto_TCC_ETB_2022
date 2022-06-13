<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="../css/menu_entrada.css">
    <link rel="stylesheet" type="text/css" href="../css/texto.css">
    <link rel="stylesheet" type="text/css" href="../css/lista_agendamentos.css">
    <script src="../js/jQuery.js"></script>
    <script src="../js/render_agendamentos.js" defer></script>
    <title> Lista.agnd.Dite.Tattoo </title>
    <style>
        body {
            width: 100%;
            width: 100vw;
        }

    </style>
</head>
<div class="container-fluid">
    <body>
    <?php include "../menus/menu_entrada.php"; ?>
    <input type="hidden" id="id_adm" value="<?php echo $_SESSION['id']; ?>">
    <div class="container-fluid">
        <button class="btn btn-dark" id="em_espera">
            Agendamentos em espera
        </button>
        <button class="btn btn-dark" id="confirmados">
            Agendamentos Confirmados
        </button>
        <button class="btn btn-dark" id="excluidos">
            Listar Agendamentos Cancelados
        </button>
        <button class="btn btn-dark" id="atendidos">
            atendidos
        </button>
        <div id="data"></div>
    </div>
    </body>
</html>
</div>