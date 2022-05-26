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
    
    $hoje = new DateTime();
    $ano_nascimento = explode("-",  $_POST["data_nasc"])[0];
    $idade = $hoje->format('Y') - $ano_nascimento;
  
if ($_SESSION['adm']){
    if($idade <= 17){
            echo "<script>
                alert ('⚠️🔞 Você ainda é Jovem para realiza uma Tattoo 🔞⚠️')
                location.href = ('../lista_cadastro.php')
            </script>";
    }else if(strlen($_POST["senha"]) < 6){
		    echo "<script>
			    	alert ('⚠️ Sua senha teve ter no minimo 6(seis) caracteres ⚠️')
				    location.href = ('../lista_cadastro.php')
			    </script>";
        }else{            
            $cliente->update($_SESSION['adm']);
            echo "<script>
			    	alert ('☺ CADASTRO DE USUÁRIO ALTERADO COM SUCESSO ☺')
				    location.href = ('../lista_cadastro.php')
			    </script>";
        }
}else{
    if($idade <= 17){
        echo "<script>
            alert ('⚠️🔞 Você ainda é Jovem para realiza uma Tattoo 🔞⚠️')
            location.href = ('../adm_cliente.php')
        </script>";
}else if(strlen($_POST["senha"]) < 6){
        echo "<script>
                alert ('⚠️ Sua senha teve ter no minimo 6(seis) caracteres ⚠️')
                location.href = ('../altera_clt.php')
            </script>";
    }else{            
        $cliente->update($_SESSION['adm']);
        echo "<script>
                alert ('☺ CADASTRO DE USUÁRIO ALTERADO COM SUCESSO ☺')
                location.href = ('../adm_cliente.php')
            </script>";
    }
}
?>