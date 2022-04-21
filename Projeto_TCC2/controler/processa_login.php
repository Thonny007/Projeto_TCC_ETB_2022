<?php
	session_start();
	include_once "../classes/Administrador.php";
	include_once "../classes/cliente.php";
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	$cliente = Cliente::verificaCliente($login, $senha);
	$admin = Administrador::verificaAdmin($login, $senha);
	
 	if ( $cliente == null && $admin == null )  {
		echo "<script>
             	alert ('🛑⚠️ Login ou Senha Incorreto ⚠️🛑')
				location.href = ('../login.php')
         	 </script>";
	}else if($cliente != null && sizeof($cliente) > 0){
		var_dump($cliente);

		$_SESSION["id"] = $cliente[0];
		$_SESSION["nome"] = $cliente[1];
		$_SESSION["adm"] = false;

		echo "é um administrador: ";
		echo $_SESSION['adm'];
	}elseif ($admin && sizeof($admin) > 0) {
		var_dump($admin);
		
		$_SESSION["id"] = $admin[0];
		$_SESSION["nome"] = $admin[1];
		$_SESSION["adm"] = true;

		echo "é um administrador: ";
		echo $_SESSION['adm'];
	}
?>