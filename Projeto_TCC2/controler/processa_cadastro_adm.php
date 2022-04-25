<?php

	include_once '../classes/Administrador.php';
	$login = Administrador::loginAlredyExist($_POST["login"]);
	// 1 - Recebe nome, login e senha
	$nome = $_POST["nome"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	if(strlen($_POST["senha"]) < 6){
		echo "<script>
				alert ('⚠️ Sua senha teve ter no minimo 6(seis) caracteres ⚠️')
				location.href = ('/Projeto_TCC2/cadastro_adm.php')
			</script>";
	}
	// 2 - instancia um admnistrador 
	$adm = new Administrador($nome, $login, $senha);

	// 3 - chamando a função insert 
	$adm->insert();

?>