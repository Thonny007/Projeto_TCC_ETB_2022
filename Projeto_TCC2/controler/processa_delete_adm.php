<?php

    include_once "../classes/Administrador.php";
    
    $id = $_GET['id'];
    $admin = Administrador::getById($id, true);

    $admin->delete($id);
    echo "
                <script>
                    alert ('☺ Registro de Administrador \n Deletado/Apagado com Sucesso ☺') 
                </script>
            ";
            echo "
            <script> 
                location.href = ('../lista_adm.php') 
            </script>";
?>