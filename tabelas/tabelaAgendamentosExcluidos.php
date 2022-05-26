<?php
    include_once "../classes/Agendamento.php";

    $adm = new Agendamentos();
    $listar = $adm->list(true);
?>
<table id="lista_cadastro" class="table mt-3 table-hover">
    <thead>
    <tr>
        <td>Data Agend</td>
        <td>Img Referencia</td>
        <td>status Agend</td>
        <td>Descrição Tattoo</td>
        <td>nome do cliente</td>

    </tr>
    </thead>
    <?php
    while ($registro = mysqli_fetch_row($listar)) {?>
        <tr>
            <td><?php echo Agendamentos::formataData($registro[1]); ?></td>
            <td>
                ver foto
                <a id="lupa" href="mostra_foto.php?id=<?php echo $registro[0]; ?>">
                    <img src="css/icons/lupa.svg" alt="icone lupa">
                </a>
            </td>
            <td><?php echo $registro[2]; ?></td>
            <td><textarea class="edit_box" cols="20" rows="0.5" style="height:30px;width:80%"
                          disabled><?php echo $registro[3]; ?> </textarea></td>
            <td><?php echo $registro[4]; ?></td>
            <td class="acoes">
            </td>
        </tr>
    <?php } ?>
    <tfoot></tfoot>
</table>
