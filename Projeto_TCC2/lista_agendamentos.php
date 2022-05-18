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
    <title> Lista.agnd.Ditte.Tattoo </title>
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
        $agnd = new Agendamentos();
		$listar = $agnd->list();
	?>

	<?php include "menu_entrada.php"; ?>
    <div class="container-fluid">
		<button class="btn btn-dark">
			<a href="agendamento.php">Novo Agendamento</a>
		</button>
		<button class="btn btn-dark">
			<a href="lista_agendamentos_confirmados.php">Agendamentos Confirmados</a>
		</button>
		<button class="btn btn-dark">
			<a href="lista_agendamentos_excluidos.php">Listar Agendamentos Cancelados</a>
		</button>

		<table id="lista_cadastro" style="opai" class="table table-hover mt-3">
			<thead>
				<tr>
					<td> Data Agend </td>
					<td> Img Referencia </td>
					<td> status Agend </td>
					<td> Descrição Tattoo </td>
					<td> Nome Cliente </td>
					<td> Ação </td>
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
					<td><?php echo $registro[2];?></td>				
					<td> <textarea class="edit_box" cols="20" rows="0.5" style="height:30px;" disabled><?php echo $registro[3];?> </textarea></td>
                    <td>
                        <!-- <a href="altera_clt.php?id_cliente=<?php /* echo $registro[5]; */?>"> -->                            <?php echo $registro[4];?>
                    </td>
					<td class="acoes">
						<a href="set_agnd_status.php?id=<?php echo $registro[0];?>&ns=confirmado&id_adm=<?php echo $_SESSION['id']; ?>">
							<img class="confirma" src="css/icons/check.svg" alt="icone check">
						</a>
						<a  href="set_agnd_status.php?id=<?php echo $registro[0];?>&ns=desmarcado&id_adm=<?php echo $_SESSION['id']; ?>">
							<img class="cancela" src="css/icons/cancel.svg" alt="icone cancelar">						
						</a>
						<button>
                            <a href="adm_altera_agendamento.php?id=<?php echo $registro[0];?>">
                                Editar <img width="24px" src="img/menu/pencil.png">
                            </a>
                        </button>
					</td>						
				</tr>
			<?php } ?>
			<tfoot></tfoot>
		</table>
	</div>
</body>
</html>
</div>