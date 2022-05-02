<?php
    include_once "../classes/Agendamento.php";
    include_once "../classes/cliente.php";
    
    $id = $_POST["id"];
    $data = $_POST["data_agendamento"];
    $hora = $_POST["hora_agendamento"].":00:00";            
    $data_completa = "$data $hora";
    $formataData = new DateTime($data_completa);
    $formataData = $formataData->format('Y-m-d H:i:s');

    $desc = $_POST["desc"];
    $foto = $_FILES["ft"];

    $agendamento = new Agendamentos($formataData, $foto["tmp_name"], $desc);
    $id_agnd = $agendamento->insert();

    Cliente::geraRelacionamento($id, $id_agnd);

?>