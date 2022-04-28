<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/lista_clt.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="css/menu_entrada.css">
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/lista_agendamentos.css">
    <title> Lista_agnd.Ditte.Tattoo </title>
	<style>
		body{
			width: 100%;
		}
		</style>
</head>
<body>
	<?php 
		include_once "classes/Agendamento.php";
		$listar = Agendamentos::list(true);
		?>

<?php include "menu_entrada.php"; ?>
<div class="container-fluid">
	<button class="btn btn-success">
		<a href="agendamento.php">novo agendamento</a>
	</button>
	
	<button class="btn btn-warning">
		<a href="lista_agendamentos.php">listar Clientes confirmados e em espera</a>
	</button>
	<table id="lista_cadastro"  class="table mt-3 table-warning">
		<thead>
			<tr>
				<td> Número Agend</td>
				<td>Data Agend</td>
				<td>Img Referencia</td>
					<td>status Agend</td>
					<td>Descrição Tattoo</td>
					<td>nome do cliente</td>
					<td>Ação</td>
				</tr>
			</thead>
			<?php		
				while ($registro = mysqli_fetch_row($listar)){
					?>	
				<tr>
					<td id="id"><?php echo $registro[0];?></td>
					<td><?php echo Agendamentos::formataData($registro[1]); ?></td>
					<td>
						ver foto
						<a id="lupa" href="mostra_foto.php?id=<?php echo $registro[0]; ?>">
							<img src="css/icons/lupa.svg" alt="icone lupa">
						</a>
					</td>		
					<td><?php echo $registro[2];?></td>				
					<td><?php echo $registro[3];?></td>
					<td><?php echo $registro[4];?></td>
					<td class="acoes">
						<a href="set_agnd_status.php?id=<?php echo $registro[0];?>&ns=confirmado">
							<img class="confirma" src="css/icons/check.svg" alt="icone check">
						</a>
						<a  href="set_agnd_status.php?id=<?php echo $registro[0];?>&ns=desmarcado">
							<img class="cancela" src="css/icons/cancel.svg" alt="icone cancelar">						
						</a>
					</td>
				</tr>
			<?php } ?>
			<tfoot></tfoot>				
		</table>

	</div>
	
</body>
</html>
</div>