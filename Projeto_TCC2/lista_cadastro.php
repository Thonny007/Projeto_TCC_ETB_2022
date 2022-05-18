<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.mim.css">
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">
    <title> Adminitração.Ditte.Tattoo </title>
    <script src="js/jQuery.js" defer></script>
    <script src="js/table_clientes.js" defer></script>
    <script src="js/form_cadastro.js" defer></script>
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
    </style>
</head>
<div class="container-fluid">

    <body>
    <?php include "menu_entrada.php" ?>
    <div id="list_cadastro" class="list_cadastro">
        <?php
            include_once "classes/cliente.php";
            $cliente = new Cliente();
            $listar = $cliente->list();
        ?>
        <div class="container">
        <button id='btn_mostrar' type="button" class="btn btn-dark">
                Mostrar Clientes Cadastrados
            </button>
            <button  id='btn_mostrar' type="button" class="btn btn-dark">
                <a class="cliente" href="adm_cadastra_clt.php"> Cadastrar Cliente </a>
            </button>
            <p></p>
            <table class="table table-striped table-hover" id="table_cliente">
                <thead>
                <tr>
                    <td>
                        <p> NOME </p>
                    </td>
                    <td>
                        <p> LOGIN </p>
                    </td>
                    <td>
                        <p> DATA NASC. </p>
                    </td>
                    <td width="5%">
                        <p> NÚMERO </p>
                    </td>
                    <td width="30%">
                        <!-- gato para empurrar a plavra ação -->
                        <p><a style="opacity:1%;">aaaaaaaa</a> AÇÃO</p>
                    </td>
                </tr>
                </thead>
                <?php while ($registro = mysqli_fetch_row($listar)) { ?>
                    <tr>
                        <td>
                            <?php echo "$registro[1]"; ?><img width="30px">
                        </td>
                        <td class="esquerda">
                            <p>
                                <?php echo $registro[2]; ?>
                            </p>
                        </td>
                        <td class="esquerda">
                            <?php echo Cliente::formataData($registro[4]); ?>
                        </td>
                        <td class="esquerda">
                            <?php echo $registro[7]; ?>
                        </td>
                        <td class="açao_td">
                            <ol class="açao_ol">
                                <dd class="açao_li">
                                    <button class="acao">
                                        <a href="adm_altera_clt.php?id=<?php echo $registro[0] ?>">
                                            Editar <img width="24px" src="img/menu/pencil.png">
                                        </a>
                                    </button>
                                </dd>
                                <dd>
                                    <button class="acao">
                                        <a href="controler/processa_delete_clt.php?id=<?php echo $registro[0] ?>">
                                            Excluir <img width="20px" src="css/icons/lixo.svg"/>
                                        </a>
                                    </button>
                                </dd>
                            </ol>
                        </td>
                    </tr>
                    <tfoot>
                    </tfoot>
                    <?php } ?>
            </table>
        </div>
    </div>
    </body>
</div>