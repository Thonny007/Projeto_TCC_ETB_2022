<?php 
	session_start ();
?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> ALTERA FUNCIONÁRIO </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    </head>
    <body>					
					<?php
						include "menu_entrada.php";
					?>
				
				<div id="funcionalidade" class="div_direita">
					<?php
						$con = mysqli_connect ("localhost", "root", "", "agendamentos");
						
						$cod = $_GET["id"];
										
						$sql_pesquisa = "SELECT  id_clt,nome_clt, login_clt, senha_clt,data_nascimento, numero_cliente
										 FROM clientes
										 WHERE id_clt = '$cod'";
						$resultado_pesquisa = mysqli_query ($con, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row($resultado_pesquisa);
					?>
					<form>
									<input type="hidden" name="id" value="<?php echo $registro[0]?>">

									<div class="form-group">
										<label>Nome</label>
										<input type="text" class="form-control" name="nome" value="<?php echo $registro[1] ?>">
									</div>
									<div class="form-group">
										<label>Data de Nascmento</label>
										<input type="date" class="form-control" name="data_nasc" value="<?php echo $registro[4]; ?>">
									</div>
									<div class="form-group">
										<label>Telefone</label>
										<input type="text" class="form-control" name="telefone" value="<?php echo $registro[7] ?>">
									</div>
									<div class="form-group">
										<label>Login</label>
										<input type="text" class="form-control" name="login" value="<?php echo $registro[2] ?>">
									</div>
									<div class="form-group">
										<label >Senha</label>
										<input type="password" class="form-control" name="senha" value="<?php echo $registro[3]?>">
									</div>
									<button type="submit" class="btn btn-danger">alterar</button>
								</form>
    </body>
</html>