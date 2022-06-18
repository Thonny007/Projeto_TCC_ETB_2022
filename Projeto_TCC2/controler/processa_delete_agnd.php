<?php
    include_once "../classes/Agendamento.php";
    
    $id = $_GET['id'];
    $agnd = Agendamentos::getById($id, true);

    $agnd->delete($id);
    echo "
                <script>
                    alert ('☺ Registro de Agendamento \n Deletado/Apagado com Sucesso ☺') 
                </script>
            ";
            echo "
            <script> 
                location.href = ('../administrador_servive/lista_agendamentos.php') 
            </script>";
?>