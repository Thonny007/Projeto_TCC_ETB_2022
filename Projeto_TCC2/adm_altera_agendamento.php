<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <title> Altera.Agendamento.Ditte.Tattoo </title>
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

        button a {
            text-decoration: none;
            color: white;
            margin: auto;
            padding: 30px;
        }

        a:hover {
            color: white;
        }
    </style>
</head>
<div class="container-fluid">
    <body>
    <?php
        include "menu_entrada.php";
        include_once "classes/Agendamento.php";
    ?>
    <div id="funcionalidade" class="div_direita">
        <?php
            $cod = $_GET["id"];
            $agnd = AgendamentoS::getById($cod);
        ?>

        <form style="width:90%;" method="POST" action="controler/processa_altera_agnd.php"
              enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $agnd[0] ?>">
            <div class="agm">
                <h3> Altera Agendamento </h3>
                <p>
                    Escolha uma Data:
                    <input id="data_agenda" type="date" name="data_agendamento" value="<?php echo $agnd[1] ?>" required>
                </p>
                <p>
                    Escolha um Horário:
                    <select name="hora_agendamento" id="hora_agendamento" required>
                        <option value="8" selected> 8hrs</option>
                        <option value="10"> 10hrs</option>
                        <option value="12"> 12hrs</option>
                        <option value="14"> 14hrs</option>
                        <option value="16"> 16hrs</option>
                        <option value="18"> 18hrs</option>
                    </select>
                </p>
                <p>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        <p> Descreva como você quer a tatuagem </p>
                    </label>
                    <textarea style="width:50%;margin:auto;" class="form-control" name="desc" rows="3"
                              value="<?php echo $agnd[4] ?>"></textarea>
                </div>
                <p>
                    Imagem/Foto de Referência
                    <input type="file" name="ft" id="ft" value="<?php echo $agnd[2] ?>">
                </p>
                <input id="cadastrar" type="submit" nome="agendar" value="ALTERAR AGENDAMENTO">
                <?php /* if ($data != null) {
            // pega a data e o horário do agendamento e separa em duas variáveis
            $agendamento = explode(" ", $data[0]);
            $dia = $agendamento[0];
            $horario = $agendamento[1];
        } else {
            $data = [0, "Cliente não possui agendamentos", "Cliente não possui agendamentos"];

            $dia = null;
            $horario = '00:00:00';
        } */ ?>
            </div>
        </form>
    </body>
</div>
</html>