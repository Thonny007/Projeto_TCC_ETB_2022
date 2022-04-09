<?php
    include_once "../classes/Agendamento.php";
    
    $data = $_POST["data_agendamento"];
    $hora = $_POST["hora_agendamento"].":00:00";            
    $data_completa = "$data $hora";
    $formataData = new DateTime($data_completa);
    $formataData = $formataData->format('Y-m-d H:i:s');

    $desc = $_POST["desc"];
    $foto = $_FILES["ft"];

    $agendamento = new Agendamentos($formataData, $foto["tmp_name"], $desc);

    $agendamento->insert();
?>