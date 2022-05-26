<?php
    include_once "../classes/Administrador.php";
    include_once '../classes/Agendamento.php';

    $adm = Administrador::getById($_GET['id'], true);
    $listar = $adm->getMyAgnds();
?>

<table id="lista_cadastro" class="table mt-3 table-hover">
    <thead>
    <td>Data Agend</td>
    <td>Img Referencia</td>
    <td>status Agend</td>
    <td>Descrição Tattoo</td>
    <td>nome do cliente</td>
    </thead>
    <tbody>
    <?php while ($registro = mysqli_fetch_row($listar)) { ?>
        <tr>
            <td><?php echo Agendamentos::formataData($registro[1]); ?></td>
            <td>
                ver foto
                <a id="lupa" href="mostra_foto.php?id=<?php echo $registro[0]; ?>">
                    <img src="css/icons/lupa.svg" alt="icone lupa">
                </a>
            </td>
            <td><?php echo $registro[2]; ?></td>
            <td><textarea class="edit_box" cols="20" rows="0.5" style="height:30px;width:80%" disabled><?php echo $registro[3];?> </textarea> </td>
            <td><?php echo $registro[4]; ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot></tfoot>
</table>
