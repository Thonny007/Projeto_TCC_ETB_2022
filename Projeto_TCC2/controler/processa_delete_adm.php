<?php
session_start();
    include_once "../classes/Administrador.php";

    $id = $_GET['id'];
    $id_adm_logado = $_GET['id_adm'];
    $admin = Administrador::getById($id, true);

    if ($id == $id_adm_logado) {
        echo "<script>
                alert('☺☺ Cadastro do(a) Administrador(a) $_SESSION[nome] Deletado com Sucesso ☺☺, Você Será Redirecionado para a Página Principal')
                location.href = ('logout.php')
            </script> ";
        $admin->delete($id);
    } else {
        $admin->delete($id);
    }