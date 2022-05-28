
<head>
    <style>
        #lista_cadastro{text-align: center}
    </style>
</head>
<?php
    include_once "../classes/Agendamento.php";
    $agnd = new Agendamentos();
    $listar = $agnd->list();
?>

<table id="lista_cadastro" style="opai" class="table table-hover mt-3">
    <thead>
    <tr>
        <td width="15%"> <b> Data Agend </b> </td>
        <td width="10%"> <b> Img Referencia </b> </td>
        <td width="15%"> <b> Status Agend </b> </td>
        <td width="15%"> <b> Descrição Tattoo </b> </td>
        <td width="15%"> <b> Nome Cliente </b> </td>
        <td width="15%"> <b> Ação </b> </td>
    </tr>
    </thead>
    <?php while ($registro = mysqli_fetch_row($listar)) {?>
        <tr>
            <td><?php echo Agendamentos::formataData($registro[1]); ?></td>
            <td>
                ver foto
                <a id="lupa" href="../administrador_servive/mostra_foto.php?id=<?php echo $registro[0]; ?>">
                    <img src="../css/icons/lupa.svg" alt="icone lupa">
                </a>
            </td>
            <td><?php echo $registro[2]; ?></td>
            <td><textarea class="edit_box" cols="20" rows="0.5" style="height:30px;"
                          disabled> <?php echo $registro[3]; ?> </textarea></td>
            <td><?php echo $registro[4]; ?></td>
            <td class="acoes">
                <a href="../administrador_servive/set_agnd_status.php?id=<?php echo $registro[0]; ?>&ns=confirmado&id_adm=<?php echo $_SESSION['id']; ?>">
                    <img class="confirma" src="../css/icons/check.svg" alt="icone check">
                </a>
                <a href="../administrador_servive/set_agnd_status.php?id=<?php echo $registro[0]; ?>&ns=desmarcado&id_adm=<?php echo $_SESSION['id']; ?>">
                    <img class="cancela" src="../css/icons/cancel.svg" alt="icone cancelar">
                </a>
                <button>
                    <a style="color:black;" href="../administrador_servive/adm_altera_agendamento.php?id=<?php echo $registro[0]; ?>">
                        Editar <img width="24px" src="../img/menu/pencil.png">
                    </a>
                </button>
            </td>
        </tr>
    <?php } ?>
    <tfoot></tfoot>
</table>
