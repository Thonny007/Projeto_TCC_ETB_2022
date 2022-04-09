<?php
	session_start();
	include_once "../classes/Administrador.php";
	include_once "../classes/cliente.php";
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	$cliente = Cliente::verificaCliente($login, $senha);
	
	$admin = Administrador::verificaAdmin($login, $senha);
 	
	if ($cliente || $admin == null) {
		echo "<script>
             	alert ('🛑⚠️ Login ou Senha Incorreto ⚠️🛑')
				location.href = ('../login.php')
         	 </script>";
} else {
	echo"<script>		
			location.href = ('../agendamento.php')
 		</script>";
	
	
	
}

	
?>