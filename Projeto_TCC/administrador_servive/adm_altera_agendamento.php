<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/Menu_entrada.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <title> Altera.Agendamento.Ditte.Tattoo </title>

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

        <form id="table_al" style="width:90%;" method="POST" action="controler/processa_altera_agnd.php" enctype="multipart/form-data">
            <input type="hidden" name="id_agnd" value="<?php echo $agnd[0] ?>">
            <input type="hidden" name="status" value="<?php echo $agnd[3] ?>">
            <div class="agm">
                <h3> Altera Agendamento </h3>
                    <p>
                        Alterar a Data:
                        <input id="data_agenda" type="date" name="dia" value="<?php echo $dia ?>" required>
                    </p>
                    <p>
                        Alterar o Horário:
                        <select name="hora" id="hora_agendamento" required>
                            <option <?php selectHora(8, $hora);?> >8hrs</option>
                            <option <?php selectHora(10, $hora);?> > 10hrs</option>
                            <option <?php selectHora(12, $hora);?> > 12hrs</option>
                            <option <?php selectHora(14, $hora);?> > 14hrs</option>
                            <option <?php selectHora(16, $hora); ?> > 16hrs</option>
                            <option <?php selectHora(18, $hora); ?> > 18hrs</option>
                        </select>
                    </p>
                    <p style="margin-left:auto;">
                        <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">
                            <p> Alterar Descrição da Tatuagem </p>
                        </label>
                        <textarea style="width:50%;margin:auto;" class="form-control" name="desc" rows="3"><?php echo $agnd[4] ?></textarea>
                </div>
                </p>
                <p> 
                    Imagem/Foto de Referência
                    <input type="file" name="ft" id="ft">
                </p>
                <div class="mt-4">
                    <input id="cadastrar" type="submit" nome="agendar" value="ALTERAR AGENDAMENTO">
                </div>
            </div>
        </form>
    </body>
</div>
</html>