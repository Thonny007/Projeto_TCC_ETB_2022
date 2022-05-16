<?php
	session_start();
	include_once "../classes/Administrador.php";
	include_once "../classes/cliente.php";

	$login = $_POST["login"];
	$senha = $_POST["senha"];

    $admin = new Administrador();
    $cliente = new Cliente();

    $cliente = $cliente->verifica($login, $senha);
    $admin = $admin->verifica($login, $senha);
	
 	if ( $cliente == null && $admin == null )  {
		echo "<script>
             	alert ('🛑⚠️ Login ou Senha Incorreto ⚠️🛑')
				location.href = ('../login.php')
         	 </script>";
	}else if($cliente != null && sizeof($cliente) > 0){
		/* var_dump($cliente); */

		$_SESSION["id"] = $cliente[0];
		$_SESSION["nome"] = $cliente[1];
		$_SESSION["adm"] = false;

		echo "<script>
				location.href = ('../adm_cliente.php')
         	 </script>";
		echo $_SESSION['adm'];
	}else if ($admin && sizeof($admin) > 0) {
		/* var_dump($admin); */
		
		$_SESSION["id"] = $admin[0];
		$_SESSION["nome"] = $admin[1];
		$_SESSION["adm"] = true;

		echo "<script>
				location.href = ('../administracao.php')
         	 </script>";
		echo $_SESSION['adm'];
	}
?>