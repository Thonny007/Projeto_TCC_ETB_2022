<?php
    session_start();
    include_once "../classes/cliente.php";
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $data_nasc = $_POST["data_nasc"];
    $telefone = $_POST["telefone"];
    $cliente = new Cliente ($id, $nome, $data_nasc, $telefone,$senha, $login);

        if(strlen($_POST["senha"]) < 6){
		    echo "<script>
			    	alert ('⚠️ Sua senha teve ter no minimo 6(seis) caracteres ⚠️')
				    location.href = ('/Projeto_TCC2/lista_cadastro.php')
			    </script>";
        }else{            
            $cliente->update($_SESSION['adm']);
            echo "<script>
			    	alert ('☺ CADASTRO DE USUÁRIO ALTERADO COM SUCESSO ☺')
				    location.href = ('/Projeto_TCC2/lista_cadastro.php')
			    </script>";
        }
    
?>