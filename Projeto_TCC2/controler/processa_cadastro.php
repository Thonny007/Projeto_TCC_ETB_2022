
<?php
    include_once "../classes/cliente.php";

    $cliente = new Cliente(
        null,
        $_POST["nome"],
        $_POST["data_nasc"],
        $_POST["telefone"],
        $_POST["senha"],
        $_POST["login"]
    );

    $login = $cliente->loginAlredyExist();

    if ($login == null) {
        $hoje = new DateTime();
        $ano_nascimento = explode("-",  $_POST["data_nasc"])[0];
        
        $idade = $hoje->format('Y') - $ano_nascimento;
        
        if($idade <= 17){
            echo "<script>
            alert ('⚠️🔞 Você ainda é Jovem para realiza uma Tattoo 🔞⚠️')
            location.href = ('/Projeto_TCC2/cadastro.php')
        </script>";
        }else if(strlen($_POST["senha"]) < 6){
            echo "<script>
                    alert ('⚠️ Sua senha teve ter no minimo 6(seis) caracteres ⚠️')
                    location.href = ('/Projeto_TCC2/cadastro.php')
                </script>";
        }else {

            $cliente->insert();

            echo "<script>
                    alert ('☺ CADASTRO REALIZADO COM SUCESSO ☺')
                    location.href = ('/Projeto_TCC2/login.php')
                </script>";
        }
    }else {
            echo "<script>
                    alert ('⚠️ login já existente favor inserir outro login ⚠️')
                    location.href = ('/Projeto_TCC2/cadastro.php')
                </script>";
        }
