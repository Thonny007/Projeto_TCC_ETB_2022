<?php
    include_once "../classes/cliente.php";
    
    $id = $_GET['id'];
    $cliente = Cliente::getById($id, true);

    $cliente->delete($id);
    
?>