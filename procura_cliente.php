<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Projeto_TCC_ETB_2022/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">
    <title> Pesquisar.clt.Ditte.Tattoo </title>
    <script src="js/jQuery.js" defer></script>
    <script src="js/table_clientes.js" defer></script>
    <script src="js/render_procurar_clientes.js" defer></script>
    <link rel="stylesheet" href="css/lista_clt.css">

</head>
<div class="container-fluid">
    <body>
        <?php include "menu_entrada.php" ?>
        <input type='text' name='pesquisa' id="name" placeholder='Digite o Nome do Cliente'>
        <button type="button" class="btn btn-dark" type='submit' id="btn-procurar">Pesquisar</button>
        <div class="container-fluid">
            <div id="data"></div>
        </div>
</body>
</div>
