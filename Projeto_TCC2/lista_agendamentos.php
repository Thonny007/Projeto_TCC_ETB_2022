<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">

    <title> Lista_agnd.Ditte.Tattoo </title>
</head>
<div class="container-fluid">
	<body>
		<?php include "menu_entrada.php"?>
        <div id="list_agendamento" class="list_agendamento"> 	
		    <?php
			    $conectar = mysqli_connect ("localhost", "root", "", "agendamentos");			
		    			$sql_consulta = "SELECT 
                                                id_agnd,data_agnd,imagem_atendimento,status_agnd,descricao_agnd
                                        FROM 
                                            agendamento";
			    		$resultado_consulta = mysqli_query ($conectar, $sql_consulta);		
	       ?>
         <p> <a href="agendamento.php"> Cadastrar Agendamentos </a> </p>
					<table id="lista_cadastro"  class="centralizar">
						<tr>
							<td width="20%">
								<p> Número Agend </p>
							</td>
							<td width="20%">
								<p> Data Agend </p>
							</td>
							<td width="20%">
								<p> Img Referencia </p>
							</td>
                            <td width="20%">
								<p> status Agend </p>
							</td>	
							<td width="20%">
								<p> Descrição Tattoo </p>
							</td>							
							<td width="20%" class="direita">
								<p> Ação </p>
							</td>
						</tr>
                        <?php		
							while ($registro = mysqli_fetch_row($resultado_consulta))
							{
						?>	
                        	<tr>
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
									<?php echo $registro[3]; ?>
								</p>
							</td>		
                            <td class="esquerda">
								<p>
									<?php echo $registro[4]; ?>
								</p>
							</td>				
                            <td class="esquerda">
								<p>
									<?php echo $registro[5]; ?>
								</p>
							</td>
							<td class="esquerda">
								<p>
									<?php echo $registro[6]; ?>
								</p>
							</td>							
						</tr>
						<?php
							}
						?>
					</table>


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