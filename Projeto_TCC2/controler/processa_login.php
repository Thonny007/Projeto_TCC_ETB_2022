<?php
	session_start();
	include_once "../classes/Administrador.php";
	include_once "../classes/cliente.php";
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	$cliente = Cliente::verificaCliente($login, $senha);
	
	$admin = Administrador::verificaAdmin($login, $senha);
 	switch($admin){
		 case 1:
				if($admin == 1){
					echo"<script>		
							location.href = ('../administracao.php')
					 	</script>";			
				}else{
					echo "ouver algum erro";
				}
			break;
		case 0:
	  		echo "<script>
	 				alert ('🛑⚠️ Login ou Senha Incorreto ⚠️🛑')
					location.href = ('../login.php')
  				</script>";
			break;
	
	}/* 
	if ($cliente == null || $$admin == null)  {
		echo "<script>
             	alert ('🛑⚠️ Login ou Senha Incorreto ⚠️🛑')
				location.href = ('../login.php')
         	 </script>";
	}else if ($cliente == 1) {
		echo"<script>		
				location.href = ('../agendamento.php')
 			</script>";
	}else{
		echo"<script>		
				location.href = ('../administracao.php')
 			</script>";
	} */


	
?>