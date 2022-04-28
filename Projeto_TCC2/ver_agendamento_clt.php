<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/altera_adm.css">
    <title> Ditte.Tattoo </title>
</head>
<body>
    <?php 
        session_start();
        include "classes/cliente.php";
        $id = $_SESSION["id"];
        $isAdm = $_SESSION["adm"];

        /*
            * argumento true para retotnar um objeto de cliente
            * sem esse parametro retorna um array com todos os campos da tabela cliente
        */
        $cliente = Cliente :: getById($id, true);

        // retorna o agendamento que estpa acossiado ao cliente
        $data = $cliente->getAgendamento($id);

        // pega a data e o horário do agendamento e separa em duas variáveis
        $agendamento = explode(" ", $data[0]);
        $dia = $agendamento[0];
        $horario = $agendamento[1];
    ?>

    <div class="container">
        <?php if (!$isAdm) {?>
        <form>
            <div class="form-group">
                <label>Descrissão</label>
                <input type="text" disabled class="form-control" name="desc" value="<?php echo $data[2]; ?>">
            </div>
            <div class="form-group">
                <label>Data do agendamento</label>
                <input type="date" disabled class="form-control" name="dia" value="<?php echo $dia; ?>">
            </div>
            <div class="form-group">
                <label>Horário</label>
                <input type="text" disabled class="form-control" name="hora" value="<?php echo $horario; ?>">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" disabled class="form-control" name="status" value="<?php echo $data[1]; ?>">
            </div>
        </form>
        <?php } ?>
    </div>
</body>
</html>		
