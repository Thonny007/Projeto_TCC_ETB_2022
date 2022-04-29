<?php session_start(); ?>
<?php include_once "classes/Administrador.php"; ?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/altera_adm.css">
        <title> Ditte.Tattoo </title>
		<style>
			form{
				background-color:#D3D3D3;
				border-radius:10px;
				margin:auto;
				width:50%;
				font-size:17px;
			}

		</style>
    </head>
<div class="container-fluid">	
    <body>
    <?php 
		  include "controler/valida_login.php";
          include "menu_entrada.php"
	?>
    <div id="funcionalidade" class="div_direita">
					<?php $registro = Administrador::getById($_SESSION["id"]);?>
					<form method="post" action="controler/processa_altera_adm.php">

						<?php 
							if ($registro != null) { 
						?>
							<div class="container">
								<form>
									<input type="hidden" name="id" value="<?php echo $registro[0]?>">

									<div class="form-group">
										<label>Nome:</label>
										<input type="text" class="form-control" name="nome" value="<?php echo $registro[1] ?>">
									</div>
									<div class="form-group">
										<label>Login:</label>
										<input type="text" class="form-control" name="login" value="<?php echo $registro[2] ?>">
									</div>
									<div class="form-group">
										<label >Senha:</label>
										<input type="password" class="form-control" name="senha" value="<?php echo $registro[3]?>">
									</div>
									<button type="submit" class="btn btn-danger"> ALTERAR </button>
								</form>
							</div>
						<?php
							}
							else {
								echo "<script>
             							alert ('⚠️ ERRO NA ALTERÇÃO ⚠️')
										location.href = ('altera_adm.php')
         	 						 </script>";
							}
						?>
					</form>
				</div>		
    </body>
</div>
</html>