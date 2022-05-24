<?php
    session_start();
    include_once "../classes/Agendamento.php";
    include_once "../classes/cliente.php";

    $id = $_POST["id"];
    $data = $_POST["data_agendamento"];
    $hora = $_POST["hora_agendamento"] . ":00:00";
    $data_completa = "$data $hora";
    $formataData = new DateTime($data_completa);
    $formataData = $formataData->format('Y-m-d H:i:s');
    $desc = $_POST["desc"];
/* 
    $path = "imgs_atendimento/". time() .$_FILES["ft"]['name'];
    $arquivo_tmp = $_FILES['ft']['tmp_name'];

    move_uploaded_file($arquivo_tmp, $path); */
if($_SESSION['adm']){
    
    $path = "imgs_atendimento/". time() .$_FILES["ft"]['name'];
    $arquivo_tmp = $_FILES['ft']['tmp_name'];
    move_uploaded_file($arquivo_tmp, $path);
    $agendamento = new Agendamentos(null, $formataData, null, $path, $desc);
    $id_agnd = $agendamento->insert();

    $cliente = Cliente::getById($id, true);
    $cliente->geraRelacionamento($id_agnd);
    echo"<script>
            alert ('AGENDAMENTO REALISADO COM SUCESSO')
            location.href = ('/Projeto_TCC2/administracao.php')
        </script>";
}else{
       
    $path = "imgs_atendimento/". time() .$_FILES["ft"]['name'];
    $arquivo_tmp = $_FILES['ft']['tmp_name'];
    move_uploaded_file($arquivo_tmp, $path);
    $agendamento = new Agendamentos(null, $formataData, null, $path, $desc);
    $id_agnd = $agendamento->insert();

    $cliente = Cliente::getById($id, true);
    $cliente->geraRelacionamento($id_agnd);

    echo"<script>
            alert ('AGENDAMENTO REALISADO COM SUCESSO')
            location.href = ('/Projeto_TCC2/ver_agendamento_clt.php')
        </script>";
}