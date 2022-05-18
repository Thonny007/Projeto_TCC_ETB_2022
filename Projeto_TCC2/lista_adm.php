<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.mim.css">
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">
    <title> Lista ADMs.Ditte.Tattoo </title>
    <script src="js/jQuery.js" defer></script>
    <script src="js/table_clientes.js" defer></script>
    <script src="js/form_cadastro.js" defer></script>
</head>
<div class="container-fluid">

    <body>
    <?php include "menu_entrada.php" ?>
    <div id="list_cadastro" class="list_cadastro">
        <?php
            $conectar = mysqli_connect("localhost", "root", "", "agendamentos");
            $sql_consulta = "SELECT id_adm, nome_adm, login_adm, senha_adm 
                                 FROM administrador";
            $resultado_consulta = mysqli_query($conectar, $sql_consulta);

            $id_adm = $_SESSION["id"];
        ?>
        <div class="container">
            <button id='btn_mostrar' type="button" class="btn btn-dark">
                Mostrar Administradores do Sistema
            </button>
            <table class="table table-striped table-hover" id="table_cliente">
                <tr>
                    <td class="esquerda">
                        <strong> Nome </strong>
                    </td>
                    <td>
                        <strong> Login </strong>
                    </td>
                    <td>
                        <strong> Ações </strong>
                    </td>
                </tr>
                <?php while ($registro = mysqli_fetch_row($resultado_consulta)) { ?>
                    <tr>
                        <?php $link = "controler/processa_delete_adm.php?id=$registro[0]&id_adm=$id_adm"; ?>
                        <?php $link_editar = "altera_adm.php?id=$registro[0]"; ?>
                        <td class="esquerda">
                            <?php $registro[0] ?>
                            <?php echo "$registro[1]"; ?>
                        </td>
                        <td>
                            <?php echo "$registro[2]"; ?>
                        </td>
                        <td>
                            <button>
                                <a href="<?php echo $link_editar; ?>">
                                    Editar <img width="24px" src="img/menu/pencil.png">
                                </a>
                            </button>
                            <button>
                                <a href="<?php echo $link; ?>">
                                    Excluir <img width="20px" src="css/icons/lixo.svg"/>
                                </a>
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</div>