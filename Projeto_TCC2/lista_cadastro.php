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
</head>
<div class="container-fluid">
	<body>
		<?php include "menu_entrada.php"?>
        <div id="list_cadastro" class="list_cadastro"> 	
		    <?php 
				include_once "classes/cliente.php";
				$listar = Cliente::list();
				?>
         <p> <a href="cadastro.php"> Cadastrar Cliente </a> </p>
					<div class="container">
						<button id='btn_mostrar' class="mb-3">mostrar clientes cadastrados</button>
						<table boder="1px" class="table bg-warning" id="table_cliente">
							<thead>
								<tr>
									<td class="esquerda">
										<p> Nº </p>
									</td>
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
								</tr>
							</thead>
							<?php
								while ($registro = mysqli_fetch_row($listar))
								{
									?>	
													<tr>
														<td class="esquerda">
									<p>
										<?php echo $registro[0]; ?>
									</p>
								</td>
								<td>
									<p>
										<a href="exibe_amp.php?codigo=<?php echo $registro[1]?>">
											<?php
												echo "$registro[1]";
												?>
										</a>
									</p>
								</td>
								<td class="esquerda">
									<p>
										<?php echo $registro[2]; ?>
									</p>
								</td>
								<td class="esquerda">
									<p>
										<?php echo Cliente::formataData($registro[4]); ?>
									</p>
								</td>		
													<td class="esquerda">
														<p>
															<?php echo $registro[7]; ?>
									</p>
								</td>
								<tfoot>
						
								</tfoot>
							</tr>
							<?php
								}
							?>
						</table>
					</div>
					

        </div>
	</body>
</div>