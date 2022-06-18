<style>#lista_cadastro{text-align: center}</style>
<?php
    session_start();
    include_once "../classes/Agendamento.php";
    $agnd = new Agendamentos();
    $listar = $agnd->listAtendidos();

    $quantidade = $agnd->countAtendidos();
?>
<p> Quantidade de Agendamentos Atendidos: <?php echo $quantidade[0]; ?></p>
<table id="lista_cadastro" style="opai" class="table table-hover mt-3">
    <thead>
    <tr>
        <td> <b> Nome do cliente </b> </td>
        <td> <b> Data Agend </b> </td>
        <td> <b> Img Referencia </b> </td>
        <td> <b> Status Agend </b> </td>
        <td> <b> Descrição Tattoo </b> </td>
        <td> <b> Ação </b> </td>
    </tr>
    </thead>
    <?php while ($registro = mysqli_fetch_row($listar)) {?>
        <tr>
            <td> <?php echo $registro[4]; ?></td>
            <td> <?php echo Agendamentos::formataData($registro[1]); ?> </td>
            <td>
                ver foto
                <a id="lupa" href="../administrador_servive/mostra_foto.php?id=<?php echo $registro[0]; ?>">
                    <img src="../css/icons/lupa.svg" alt="icone lupa">
                </a>
            </td>
            <td><?php echo $registro[2]; ?></td>
            <td>
                <label>
                    <textarea class="edit_box"
                        cols="20" rows="0.5" style="height:30px;"
                        disabled> <?php echo $registro[3];
                    ?></textarea>
                </label>
            </td>
            <td class="acoes">
              
            </td>
        </tr>
    <?php } ?>
    <tfoot></tfoot>
</table>
