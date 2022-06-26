<?php
require_once "../classes/Agendamento.php";
require_once "../classes/cliente.php";

    $id = $_POST['id_agnd'];
    $data = $_POST['dia']." ".$_POST['hora'];
    $status = $_POST['status'];
    $desc = $_POST['desc'];

   if ($_FILES["ft"]['name'] != '') {
        $path = "imgs_atendimento/". time() .$_FILES["ft"]['name'];
        $arquivo_tmp = $_FILES['ft']['tmp_name'];
        move_uploaded_file($arquivo_tmp, $path);
    
        $agnd = new Agendamentos($id, $data, $status, $path, $desc);
    } else {
        $agnd = new Agendamentos($id, $data, $status, null, $desc);
    }
   
    $agnd->update();