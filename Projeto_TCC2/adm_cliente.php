<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>
        #rodape_x h5{
            color:SaddleBrown;
        }
        #rodape_x dd a{
            color:SaddleBrown;
        }
        #rodape_x h6{
            color:SaddleBrown;
        }
        #rodape_x p{
            color:PeachPuff;
        }
    </style>
    <title> Adminitração.Ditte.Tattoo </title>
</head>
<div class="container-fluid">
	<body>
		<?php include "menu_entrada_clt.php"?> 	
		<div id="adm_lista"> 
			<ul>		
				<li> <a href="altera_clt.php?id_cliente=<?php echo $_SESSION['id']?>" > Alterar meu Cadastro </a> </li>
				<li> <a href="agendamento.php" > Realizar Agendamento  </a> </li>
                <li> <a href="ver_agendamento_clt.php"> Ver Agendamento </a> </li>
			</ul>
        <div id="rodape_x" class="rodape_1">
                <?php include "rodape.php" ?>
            </div>
	</body>
</div>