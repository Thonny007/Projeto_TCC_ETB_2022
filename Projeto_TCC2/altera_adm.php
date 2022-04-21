<?php 
	session_start ();
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
		<?php include "menu_entrada.php"?> 	
					<h1> ALTERAÇÃO DE ADMINISTRADOR(A) </h1>
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "agendamento");
						
						$cod = $_GET["id_adm"];
										
						$sql_pesquisa = "SELECT  nome_adm, login_adm, senha_adm
										 FROM administrador
										 WHERE cod_adm = '$cod'";
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row($resultado_pesquisa);
					?>
					<form method="post" action="processa_altera_fun.php">
						<input type="hidden" name="codigo" value="<?php echo "$cod"; ?>">
						<?php 
							if ($registro[1] <> "administrador") 
							{ 
						?>
							<table>	
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
									<td>
										<p> Status:  </p>
									</td>
									<td>
										<p>
											<select name="status">
												<option value="ativo"
													<?php
														if ($registro[4] == "ativo") {
															echo "selected";
														}
													?> > Ativo 
												</option>
												<option value="inativo"<?php
													if ($registro[4] == "inativo") {
														echo "selected";
													}
													?> > Inativo 
												</option>
											</select>
										</p>
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
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> AMPLI - CONTROL </h6> 
						<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
					</div> 
			</div>
		</div>
    </body>
</html>