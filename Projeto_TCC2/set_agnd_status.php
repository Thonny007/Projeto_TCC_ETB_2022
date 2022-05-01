<?php
    include_once "classes/Agendamento.php";
    include_once "classes/Administrador.php";
        
    $id_agnd = $_GET['id'];
    $id_adm = $_GET['id_adm'];
    $new_status = $_GET['ns'];

    $adm = Administrador::getById($id_adm, true);

    Agendamentos::updateStatus($id_agnd, $new_status);
    $adm->setMyAgnds($id_adm, $id_agnd);

    echo 
    "
         <script>location.href = 'lista_agendamentos.php'</script>
    ";
?>