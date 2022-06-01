<head>
    <style>
        #lista_cadastro{text-align: center}
    </style>
</head>
<?php
    include_once "../classes/Administrador.php";
    include_once '../classes/Agendamento.php';

    $adm = Administrador::getById($_GET['id'], true);
    $listar = $adm->getMyAgnds();
?>

<table id="lista_cadastro" class="table mt-3 table-hover">
    <thead>
            <td> <b> Data Agend </b> </td>
            <td> <b> Img Referencia </b> </td>
            <td> <b> Status Agend </b> </td>
            <td> <b> Descrição Tattoo </b> </td>
            <td> <b> Nome Cliente </b> </td>
            <td> <b> Ações </b> </td>
        </thead>
    <tbody>
    <?php while ($registro = mysqli_fetch_row($listar)) { ?>
        <tr>
            <td><?php echo Agendamentos::formataData($registro[1]); ?></td>
            <td>
                ver foto
                <a id="lupa" href="../administrador_servive/mostra_foto.php?id=<?php echo $registro[0]; ?>">
                    <img src="../css/icons/lupa.svg" alt="icone lupa">
                </a>
            </td>
            <td><?php echo $registro[2]; ?></td>
            <td><textarea class="edit_box" cols="20" rows="0.5" style="height:30px;width:80%" disabled><?php echo $registro[3];?> </textarea> </td>
            <td><?php echo $registro[4]; ?></td>
            <td class="acoes">
                <button>
                    <a style="color:black;" href="adm_altera_agendamento.php?id=<?php echo $registro[0]; ?>">
                        Editar <img width="24px" src="../img/menu/pencil.png">
                    </a>
                </button>
                <input type="hidden" id="id" value="<?php echo $registro[0]; ?>">
                <button id="atender">
                    <a style="color:black;" href="../controler/confirma_agendamento.php?id=<?php echo $registro[0]; ?>">
                        atendido<img width="24px" src="../img/confirm.png">
                    </a>
                </button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot></tfoot>
</table>
