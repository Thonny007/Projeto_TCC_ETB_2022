<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/carousel.css">
        <link rel="stylesheet" type="text/css" href="css/texto.css">
        <title> Ditte.Tattoo </title>
    </head>
    <body>
    <?php 
          include "controler/valida_login.php"?>
    <div id="funcionalidade" class="div_direita">
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "agendamentos");
						
						$cod = $_GET["codigo"];
										
						$sql_pesquisa ="SELECT  id_adm ,nome_adm, login_adm, senha_adm,
            								FROM administrador
										        WHERE id_adm = '$id'";
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);		
						$registro = mysqli_fetch_row($resultado_pesquisa);
					?>
					<form method="post" action="processa_altera_adm.php">
						
						<input type="hidden" name="codigo" value="<?php echo "$cod"; ?>">

						<?php 
							if ($registro[0] <> $cod) 
							{ 
						?>
							<table class="centralizar">	
								<tr>
									<td>
										<p> Nome: </p>
									</td>
									<td>
										<p> <input type="text" name="nome" value="<?php echo "$registro[1]";?>" required> </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Login:  </p>
									</td>
									<td>
										<p> <input type="text" name="login" value="<?php echo "$registro[2]";?>" required >  </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Senha:  </p>
									</td>
									<td>
										<p> <input type="password" name="senha" value="<?php echo "$registro[3]";?>" required >  </p>
									</td>
								</tr>					
								<tr>
									<td colspan="2">
										<p> <input type="submit" value="Alterar Funcionário">  </p>
									</td>
								</tr>
							</table>
						<?php
							}
							else {
						?>
							<table class="centralizar">	
								<tr>
									<td>
										<p> Nome: </p>
									</td>
									<td>
										<p> <?php echo "$registro[0]"; ?> </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> funcao:  </p>
									</td>
									<td>
										<p> <?php echo "$registro[1]";?> </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Login:  </p>
									</td>
									<td>
										<p> <?php echo "$registro[2]";?> </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Senha:  </p>
									</td>
									<td>
										<p> <input type="password" name="senha" value="<?php echo "$registro[3]";?>" required>  </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Status:  </p>
									</td>
									<td>
										<p>
											Ativo
										</p>
									</td>
								</tr>															
								<tr>
									<td colspan="2">
										<p> <input type="submit" value="Alterar Usuario">  </p>
									</td>
								</tr>
							</table>
						<?php
							}
						?>
					</form>
				</div>
  
		
    </body>
</html>