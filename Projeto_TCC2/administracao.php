<?php 	session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" type="text/css" href="css/admin.css">

    <title> Adminitração.Ditte.Tattoo </title>
</head>
<div class="container-fluid">
	<body>
		<?php include "controler/valida_login.php"?>
		<?php include "menu_entrada.php"?> 	
		<div id="adm_lista"> 
			<ul>		
				<li> <a href="lista_cadastro.php" > Listar Cadastros </a> </li>
				<li> <a href="lista_agendamentos.php" > Agendamentos </a> </li>
				<li> <a href="cadastro_adm.php"> Cadastrar Administrador</a></li>
				<li> <a href="lista_adm.php">Listar Administradores </a> </li>
				<li> <a href="altera_adm.php"> Alterar Dados</a> </li>
			</ul>
		</div>
	</body>
</div>