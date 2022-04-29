<?php
    include_once "classes/Agendamento.php";
        
    $id = $_GET['id'];
    $new_status = $_GET['ns'];

    Agendamentos::updateStatus($id, $new_status);

    echo 
    "
        <script>location.href = 'lista_agendamentos.php'</script>
    ";
?>