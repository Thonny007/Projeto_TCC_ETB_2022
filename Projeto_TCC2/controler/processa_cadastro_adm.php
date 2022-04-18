
<?php
    include_once "../classes/administrador.php";

    if(strlen($_POST["senha"]) < 6){
        echo "<script>
                alert ('☺ Sua senha teve ter no minimo 6(seis) caracteres ☺')
                location.href = ('/Projeto_TCC2/cadastro.php')
             </script>";
    }else {
        
        $administrador = new Administrador(
            $_POST["nome"],
            $_POST["senha"],
            $_POST["login"]
        );



        $administrador->insert();

        echo "<script>
                alert ('☺ CADASTRO DO ADM REALIZADO COM SUCESSO ☺')
                location.href = ('/Projeto_TCC2/administracao.php')
              </script>";
    }
?>