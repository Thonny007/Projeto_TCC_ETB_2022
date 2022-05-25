<?php
    include_once '../classes/cliente.php';
    $cliente = new Cliente();

    $listar = $cliente->listByName($_GET['name']);

    while ($registro = mysqli_fetch_row($listar)){
?>

<pre>
    <?php print_r($registro); ?>
</pre>

<?php } ?>