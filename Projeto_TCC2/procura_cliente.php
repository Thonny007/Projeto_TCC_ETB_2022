<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.mim.css">
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">
    <title> Pesquisar.clt.Ditte.Tattoo </title>
    <script src="js/jQuery.js" defer></script>
    <script src="js/table_clientes.js" defer></script>
    <script src="js/form_cadastro.js" defer></script>
    <script src="js/renderClientes.js" defer></script>
    <style>
        .açao_td .açao_ol dd {
            display: inline-block;
            list-style-type: none;
        }

        .acao {
            width: 90px;
            height: 30px;
        }

        .txt {
            text-align: center;
        }
        .cliente{
            text-decoration: none;
            color:white;
        }
        .cliente:hover{
            text-decoration: none;
            color:white;
        }
        button a{
            text-decoration: none;
            color:white;
        }
        button a:hover{
            text-decoration: none;
            color:white;
        }
        .pesquisar{
            width:20%;
            float:right;
            margin:auto;
            
        }
    </style>
</head>
<div class="container-fluid">
<body>
<?php include "menu_entrada.php" ?>
    <!-- <div class="container">
        <div id="data"></div>
    </div> -->
    <div class="pesquisar">
        <input type="text" class="pesq" placeholder="Digite o nome do Cliente">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><img src="css/icons/lupa.svg" alt=""></button>
    </div>
</body>
    </div>
