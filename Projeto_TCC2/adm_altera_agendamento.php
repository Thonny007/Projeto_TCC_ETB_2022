<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/Menu_entrada.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
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

            $data = explode(' ', $agnd[1]);
            $dia = $data[0];
            $hora = $data[1];
            $hora = explode(':', $hora)[0];

            function selectHora(int $value, string $hora_agnd): void{
                if ($value == $hora_agnd){
                    echo "value=\"$value\" selected";
                }else {
                    echo "value=\"$value\"";
                }
            }

        ?>

        <form style="width:90%;" method="POST" action="controler/processa_altera_agnd.php"
              enctype="multipart/form-data">
            <input type="hidden" name="id_agnd" value="<?php echo $agnd[0] ?>">
            <input type="hidden" name="status" value="<?php echo $agnd[3] ?>">
            <div class="agm">
                <h3> Altera Agendamento </h3>
                    Escolha uma Data:
                    <input id="data_agenda" type="date" name="dia" value="<?php echo $dia ?>" required>
                    <div>
                        Escolha um Horário:
                        <select name="hora" id="hora_agendamento" required>
                            <option <?php selectHora(8, $hora);?> >8hrs</option>
                            <option <?php selectHora(10, $hora);?> > 10hrs</option>
                            <option <?php selectHora(12, $hora);?> > 12hrs</option>
                            <option <?php selectHora(14, $hora);?> > 14hrs</option>
                            <option <?php selectHora(16, $hora); ?> > 16hrs</option>
                            <option <?php selectHora(18, $hora); ?> > 18hrs</option>
                        </select>
                    </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        <p> Descreva como quer a tatuagem </p>
                    </label>
                    <textarea style="width:50%;margin:auto;" class="form-control" name="desc" rows="3"
                    ><?php echo $agnd[4] ?></textarea>
                </div>
                <div>
                    <span>Imagem/Foto de Referência</span>
                    <input type="file" name="ft" id="ft">
                </div>
                <div class="mt-4">
                    <input id="cadastrar" type="submit" nome="agendar" value="ALTERAR AGENDAMENTO">
                </div>
            </div>
        </form>
    </body>
</div>
</html>