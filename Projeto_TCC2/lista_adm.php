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
			$conectar = mysqli_connect ("localhost", "root", "", "agendamentos");				
			$sql_consulta = "SELECT id_adm, nome_adm, login_adm, senha_adm 
                            FROM 
                                    administrador";
			$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
							
					?>
					<table border=1 class="centralizar">
						<tr>
							<td class="esquerda">
								<p> Nome </p>
							</td>
							<td>
								<p> Login </p>
							</td>
						</tr>
						<?php		
							while ($registro = mysqli_fetch_row($resultado_consulta)) 
							{											
						?>						
						<tr>
							<td class="esquerda">
								<p> 
										<?php 
											echo "$registro[1]";
										?>
									</a>
								</p>
							</td>
							<td>
								<p>									 
									<?php echo "$registro[2]"; ?>
								</p>
							</td>
						</tr>
						<?php
							}
						?>
					</table>
            </div>

</div>
</body>
</div>