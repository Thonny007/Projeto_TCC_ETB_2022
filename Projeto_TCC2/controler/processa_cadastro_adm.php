<?php

	include_once '../classes/Administrador.php';

	// 1 - Recebe nome, login e senha
	$nome = $_POST["nome"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];

	// 2 - instancia um admnistrador 
	$adm = new Administrador($nome, $login, $senha);

	// 3 - chamando a função insert 
	$adm->insert();

?>