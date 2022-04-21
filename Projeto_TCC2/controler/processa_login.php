<?php
	session_start();
	include_once "../classes/Administrador.php";
	include_once "../classes/cliente.php";
	$login = $_POST["login"];
	$entrar = $_POST["entrar"];
	$senha = $_POST["senha"];
	$cliente = Cliente::verificaCliente($login, $senha);
	$admin = Administrador::verificaAdmin($login, $senha);
	
	if ( $cliente == 0 || $admin == 0 )  {
		echo "<script>
             	alert ('🛑⚠️ Login ou Senha Incorreto ⚠️🛑')
				location.href = ('../login.php')
         	 </script>";
	}else{
		echo"<script>		
				location.href = ('../administracao.php')
 			</script>";
	}


	
?>