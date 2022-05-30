<?php
    include_once "../classes/Administrador.php";
    
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $adm = new Administrador($id, $nome, $login, $senha);
   /*  if ($login == null) { */
        if(strlen($_POST["senha"]) < 6){
            echo "<script>
                    alert ('⚠️ Sua senha teve ter no minimo 6(seis) caracteres ⚠️')
                    location.href = ('../administrador_servive/altera_adm.php?id=$id')
                </script>";
        }else {
    
            $adm->update();
    
            echo "<script>
                        alert ('☺ ADMINISTRADOR ALTERADO COM SUCESSO ☺')
                        location.href = ('../administrador_servive/lista_adm.php')
                  </script>";
        }
   /*  }else {
        echo "<script>
                    alert ('⚠️ Login Já Existente Favor Inserir Outro Login ⚠️')
                    location.href = ('../lista_adm.php')
                </script>"; */
/* } */