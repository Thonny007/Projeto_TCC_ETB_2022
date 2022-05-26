<?php
	include_once '../classes/Administrador.php';
	// 1 - Recebe nome, login e senha
	$nome = $_POST["nome"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
    # instanciando administrador e verificando se possui
    $admin = new Administrador(null, $nome, $login, $senha);
    $login = $admin->loginAlredyExist();
    if ($login == null){
        if(strlen($_POST["senha"]) < 6){
		    echo "<script>
			    	alert ('⚠️ Sua senha teve ter no minimo 6(seis) caracteres ⚠️')
				    location.href = ('../cadastro_adm.php')
			    </script>";
	    }else{
	            // 3 — chamando a função insert se o ‘login’ informado estiver disponível
                $admin->insert();
        }
    }else{
        echo"<script>
                alert('⚠️⚠️ Login Já Cadastrado Favor Tente Outro ⚠️⚠️');
                location.href = '(../cadastro_adm.php')
            </script>
                    ";
    }
