<?php
    include_once '../classes/cliente.php';
    $cliente = new Cliente();

    $listar = $cliente->listByName($_GET['name']);
    $qtd = $listar->num_rows;
?>
<?php if($qtd > 0){ ?>
    <p> <?php echo $qtd;?> registros encontrados</p>
    <table class="table table-striped table-hover" id="table_cliente">
    <?php while ($registro = mysqli_fetch_row($listar)) { ?>
        <tr>
            <td>
                <label>
                    <textarea name="ta" class="edit_box" cols="30" rows="0.5" style="height:30px;color:black"
                              disabled><?php echo "$registro[1]"; ?></textarea>
                </label>
            </td>
            <td class="esquerda">
                <p>
                    <?php echo $registro[2]; ?>
                </p>
            </td>
            <td class="esquerda">
                <?php try {
                    echo Cliente::formataData($registro[4]);
                } catch (Exception $e) {
                } ?>
            </td>
            <td class="esquerda">
                <?php echo $registro[7]; ?>
            </td>
            <td class="açao_td">
                <ol class="açao_ol">
            <td class="açao_li">
                <button class="acao">
                    <a style="color:black;" href="../adm_altera_clt.php?id=<?php echo $registro[0] ?>">
                        Editar <img width="24" src="../img/menu/pencil.png" alt="">
                    </a>
                </button>
            </td>
            <td>
                <button class="acao">
                    <a style="color:black;" href="../controler/processa_delete_clt.php?id=<?php echo $registro[0] ?>">
                        Excluir <img width="20px" src="../css/icons/lixo.svg" alt="a"/>
                    </a>
                </button>
            </td>
        </tr>
        <tfoot></tfoot>
        <?php } ?>
    </table>
<?php }else{ ?>
    <h1>Desculpe Nenhum registro encontrado</h1>
<?php } ?>
