<?php
    include_once '../classes/cliente.php';

    $clt = Cliente::getById($_GET['id'], true);

    try {
        $listar = $clt->listByName('5');
    }catch (Throwable $th){
        echo "Deu erro Mesmo";
    }
?>

<pre>
    <?php print_r($clt); ?>
</pre>