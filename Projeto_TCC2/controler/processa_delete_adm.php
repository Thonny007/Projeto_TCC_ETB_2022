<?php

    include_once "../classes/Administrador.php";

    $id = $_GET['id'];
    $id_adm_logado = $_GET['id_adm'];
    $admin = Administrador::getById($id, true);

    if ($id == $id_adm_logado) {
        echo
        "
                <script>
                    location.href = 'logout.php';
                </script>
            ";
    } else {
        $admin->delete($id);
    }