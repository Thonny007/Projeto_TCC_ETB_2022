<?php
require_once "../classes/Agendamento.php";
require_once "../classes/cliente.php";

    $id = $_POST['id_agnd'];
    $data = $_POST['dia']." ".$_POST['hora'];
    $status = $_POST['status'];
    $desc = $_POST['desc'];

    $agnd = new Agendamentos($id, $data, $status, null, $desc);
    $agnd->update();