<?php

include_once "../classes/Agendamento.php";
include_once "../classes/Administrador.php";

$id_agnd = $_GET['id'];
$id_adm = $_GET['id_adm'];
$new_status = $_GET['ns'];

$adm = Administrador::getById($id_adm, true);
$agnd = Agendamentos::getById($id_agnd, true);

$agnd->updateStatus($new_status);

if ($new_status != 'desmarcado'){
    $adm->setMyAgnds($id_agnd);
}

echo "<script> location.href = ('lista_agendamentos.php') </script>";