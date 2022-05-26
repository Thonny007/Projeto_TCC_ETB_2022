<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Projeto_TCC_ETB_2022/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">
    <title> Pesquisar.clt.Dite.Tattoo </title>
    <script src="js/jQuery.js" defer></script>
    <script src="js/table_clientes.js" defer></script>
    <script src="js/render_procurar_clientes.js" defer></script>
    <link rel="stylesheet" href="css/lista_clt.css">
    <style>
        #pesquisar{
            border: 2px solid #ccc;
            display: inline-block;
            padding: 3px;
            width:23%;
            background-color:white;
            display: block;
            /* float: right; */
           /*  margin-right: 10px; */
            border-radius:10px;
        }
        #pesquisar > input {
            border: none
        }
        #pesquisar > button {
            background: royalblue;
            border: none;
            padding: 4px 10px
        }

    </style>
</head>
<div class="container-fluid">
    <body>
        <?php include "menu_entrada.php" ?>
        <div id="pesquisar" class="pesq_clt">
            <input type='text' name='pesquisa' id="name" placeholder='Digite o Nome do Cliente'>
            <button type="button" class="btn btn-secondary" type='submit' id="btn-procurar"><img src="css/icons/lupa.svg" alt="img_lupa"/> Pesquisar</button>
        </div>  
        <div class="container-fluid">
            <div id="data"></div>
        </div>
  
        <p></p>
</body>
</div>
