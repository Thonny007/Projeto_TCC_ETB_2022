<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altera Cadastro</title>
</head>
<body>
    <?php 
        include "menu_entrada.php"
    ?>
<h1> ALTERAÇÃO DE DADOS </h1>
<?php
						$conectar = mysqli_connect ("localhost", "root", "", "agendamentos");
						
						$cod = $_GET["id_clt"];
										
						$sql_pesquisa = "SELECT  nome_clt, login_clt, senha_clt
										 FROM cliente
										 WHERE id_clt = '$cod'";
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row($resultado_pesquisa);
					?>
					<form method="post" action="processa_altera_fun.php">
						
						<input type="hidden" name="codisgo" value="<?php echo "$cod"; ?>">
						<?php 
							if ($registro[1] <> "cliente") 
							{ 
						?>
							<table class="centralizar">	
								<tr>
									<td>
										<p> Nome: </p>
									</td>
									<td>
										<p> <input type="text" name="nome" value="<?php echo "$registro[0]";?>" required> </p>
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













</body>
</html>