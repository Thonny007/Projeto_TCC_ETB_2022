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
</head>
<div class="container-fluid">

    <body>
        <?php include "menu_entrada.php"?>
        <div id="list_cadastro" class="list_cadastro">
            <?php 
				include_once "classes/cliente.php";
				$listar = Cliente::list();
			?>
            <!-- <p> <a href="cadastro.php"> Cadastrar Cliente </a> </p> -->
            <div class="container">
				<button id='btn_mostrar' type="button" class="btn btn-dark">
                    Mostrar Clientes Cadastrados
                </button>
               <!--  <button id='btn_mostrar1' type="button" class="btn btn-dark">
                    Cadastrar Cliente
                </button> -->
                <table  class="table table-striped table-hover" id="table_cliente">
                    <thead>
                        <tr>
                            <td width="20%">
                                <p> NOME </p>
                            </td>
                            <td width="20%">
                                <p> LOGIN </p>
                            </td>
                            <td width="20%">
                                <p> DATA NASC. </p>
                            </td>
                            <td width="20%">
                                <p> NÚMERO </p>
                            </td>
                            <td>
                                <p>AÇÃO</p>
                            </td>
                        </tr>
                    </thead>
                    <?php
                    while ($registro = mysqli_fetch_row($listar))
                    {
					?>
                    <tr>

                        <td>
                            <?php echo "$registro[1]";?>
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
                        <td>
                            <a href="controler/processa_delete_clt.php?id=<?php echo $registro[0] ?>" >
								Excluir <img width="20px"  src="css/icons/lixo.svg"/>
							</a>
                        </td>    
                    </tr>
                    <tfoot>
                    </tfoot>
                    <?php
					    }
					?>
                </table>
              
            </div>

</div>
</body>
</div>