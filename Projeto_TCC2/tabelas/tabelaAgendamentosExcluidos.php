<head>
    <style>
        #lista_cadastro{text-align: center}
    </style>
</head>
<?php
    include_once "../classes/Agendamento.php";

    $adm = new Agendamentos();
    $listar = $adm->list(true);
?>
<table id="lista_cadastro" class="table mt-3 table-hover">
    <thead>
        <tr>
        <!-- a tag (B) deixa em NEGRITO -->
        <td width="15%">  <b> Data Agend  </b></td>
        <td width="15%"> <b> Img Referencia </b> </td>
        <td width="20%"> <b> Status Agend </b> </td>
        <td width="20%"> <b> Descrição Tattoo </b> </td>
        <td width="20%"> <b> Nome do Cliente </b> </td>
        <td width="20%"> <b> Ação </b> </td>
        </strong>
    </tr>
    
    </thead>
    <?php
    while ($registro = mysqli_fetch_row($listar)) {?>
        <tr>
            <td> <?php echo Agendamentos::formataData($registro[1]); ?> </td>
            <td>
                ver foto
                <a id="lupa" href="../administrador_servive/mostra_foto.php?id=<?php echo $registro[0]; ?>">
                    <img src="../css/icons/lupa.svg" alt="icone lupa">
                </a>
            </td>
            <td><?php echo $registro[2]; ?></td>
            <td><textarea class="edit_box" cols="20" rows="0.5" style="height:30px;width:80%"
                          disabled><?php echo $registro[3]; ?> </textarea></td>
            <td><?php echo $registro[4]; ?></td>
            <td class="acoes">
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
