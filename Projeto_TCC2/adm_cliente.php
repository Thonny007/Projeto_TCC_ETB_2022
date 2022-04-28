<?php session_start(); ?>
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
		<?php include "menu_entrada_clt.php"?> 	
		<div id="adm_lista"> 
			<ul>		
				<li> <a href="altera_clt.php" > Alterar meu Cadastro </a> </li>
				<li> <a href="agendamento.php" > Realizar agendamento  </a> </li>
                <li> <a href="ver_agendamento_clt.php"> Ver Agendamento </a> </li>
			</ul>
        <div class="rodape_1">
                <?php include "rodape.php" ?>
            </div>
	</body>
</div>