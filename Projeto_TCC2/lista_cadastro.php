<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.mim.css">
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">

    <title> Adminitração.Ditte.Tattoo </title>
</head>
<div class="container-fluid">
	<body>
		<?php include "menu_entrada.php"?>
        <div id="list_cadastro" class="list_cadastro"> 	
		    <?php
			    include_once "classes/cliente.php";
				$conectar = mysqli_connect ("localhost", "root", "", "agendamentos");			
		    			$sql_consulta = "SELECT 
                                                id_clt, nome_clt, login_clt, senha_clt, data_nascimento, id_agnd,id_adm, 
                                                numero_cliente 
                                        FROM 
                                            cliente";
			    		$resultado_consulta = mysqli_query ($conectar, $sql_consulta);		
	       ?>
         <p> <a href="cadastro.php"> Cadastrar Cliente </a> </p>
					<div class="container">
						<table boder="1px" class="table bg-warning">
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
								while ($registro = mysqli_fetch_row($resultado_consulta))
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
    <!-- 
        <div id="adm_lista"> 
			<ul>		
				<li> <a href="administracao.php" > Administração </a> </li>
				<li> <a href="lista_cadastro.php" > Cadastros Realizados </a> </li>
				<li> <a href="lista_agendamentos" > Agendamentos Realizados  </a> </li>
	
			</ul>
			<ul>
				<li><a href="lista_agendamento"></a></li>
    			<li> <a href="agendamento.php" > Agendar Tattoo </a> </li>  
    			<li> <a href="orçamento.php"> Orçamento </li>
			</ul>

 			<ul>		
				<li> <a href="administracao.php" > AdminitraAdminitração </a> </li>
				<li> <a href="vendas.php" > Vendas </a> </li>
            </div>
        </ul>-->
	</body>
</div>