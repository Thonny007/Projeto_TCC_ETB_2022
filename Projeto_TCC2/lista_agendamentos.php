<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="css/menu_entrada.css">
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/lista_agendamentos.css">
	<script src="js/jQuery.js"></script>
    <title> Lista_agnd.Ditte.Tattoo </title>
	<style>
		body{
			width: 100%;
			width: 100vw;
		}
	</style>
</head>
<div class="container-fluid">
<body>
	<?php 
		include_once "classes/Agendamento.php";
		$listar = Agendamentos::list(false);
	?>

	<?php include "menu_entrada.php"; ?>
<div class="container-fluid">
		<button class="btn btn-dark">
			<a href="agendamento.php">Novo Agendamento</a>
		</button>

		<button class="btn btn-dark"> Listar Agendamentos Excluidos</button>
		<table id="lista_cadastro" style="opai" class="table table-striped table-hover">
			<thead>
				<tr>
					<td>Data Agend</td>
					<td>Img Referencia</td>
					<td>status Agend</td>
					<td>Descrição Tattoo</td>
					<td>Ação</td>
				</tr>
			</thead>
			<?php		
				while ($registro = mysqli_fetch_row($listar)){
			?>	
				<tr>

					<td><?php echo Agendamentos::formataData($registro[1]); ?></td>
					<td>
						ver foto
						<a id="lupa" href="mostra_foto.php?id=<?php echo $registro[0]; ?>">
							<img src="css/icons/lupa.svg" alt="icone lupa">
						</a>
					</td>		
					<td><?php echo $registro[2]; ?></td>				
					<td><?php echo $registro[3]; ?></td>
					
					<td class="acoes">
						<img src="css/icons/check.svg" alt="icone check">
						<img src="css/icons/cancel.svg" alt="icone cancelar">
					</td>							
				</tr>
			<?php } ?>
			<tfoot></tfoot>
		</table>

	</div>
	
</body>
</html>
</div>