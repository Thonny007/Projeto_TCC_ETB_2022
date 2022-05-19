<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/altera_adm.css">
    <title> Ditte.Tattoo </title>
    <style>
        form {
            width: 50%;
            margin: auto;
            background-color: #808080;
            font-size: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        include "classes/cliente.php";
        include "menu_entrada_clt.php";
        $id = $_SESSION["id"];
        $isAdm = $_SESSION["adm"];

        /*
            * argumento true para retotnar um objeto de cliente
            * sem esse parametro retorna um array com todos os campos da tabela cliente
        */
        $cliente = Cliente::getById($id, true);

        // retorna o agendamento que estpa acossiado ao cliente
        $data = $cliente->getAgendamento($id);

        if ($data != null) {
            // pega a data e o horário do agendamento e separa em duas variáveis
            $agendamento = explode(" ", $data[0]);
            $dia = $agendamento[0];
            $horario = $agendamento[1];
        } else {
            $data = [0, "Cliente não possui agendamentos", "Cliente não possui agendamentos"];

            $dia = null;
            $horario = '00:00:00';
        }
    ?>
    <div class="container">
        <?php if (!$isAdm) { ?>
            <!-- TODO botão de upload pras fotos -->
            <form method="post" action="controler/processa_altera_agnd.php">
                <input type="hidden" name="id_agnd" value="<?php echo $data[3]; ?>">
                <div class="form-group">
                    <label>Descrissão</label> <br>
                    <textarea class="edit_box" cols="20"
                              rows="10" style="height:60px;width:100%;"
                              name="desc"
                    ><?php echo $data[2]; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Data do agendamento</label>
                    <input type="date" class="form-control" name="dia" value="<?php echo $dia; ?>">
                </div>
                <div class="form-group">
                    <label>Horário</label>
                    <input type="text" class="form-control" name="hora" value="<?php echo $horario; ?>">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control" name="status" value="<?php echo $data[1]; ?>">
                </div>
                <button type="submit" class="btn btn-danger">alterar</button>
            </form>
        <?php } ?>
    </div>
</body>
</html>		
