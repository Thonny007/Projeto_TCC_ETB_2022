<?php session_start()?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <!-- bot css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <!-- bot css -->
    <!-- bot js -->
    <script type="text/javascript" src="css/bootstrap/bootstrap.min.js" defer></script>
    <!-- bot js -->
    <title> Agendamento.Ditte.Tattoo </title>
</head>
<div class="container-fluid">
    <body>
        <!-- LOGO -->
        <?php include "menu_entrada.php";?>
        
        <form method="POST" action="controler/processa_agendamento.php" enctype="multipart/form-data">
            <div class="agm">
                <h3> Agendamento </h3>
                <p>
                    Escolha uma Data:
                    <input id="data_agenda" type="date" name="data_agendamento" required>
                </p>
                <p>
                    Escolha um Horário:
                    <select name="hora_agendamento" id="hora_agendamento" required>
                        <option value="8"selected>8hrs</option>
                        <option value="10" >10hrs</option>
                        <option value="12">12hrs</option>
                        <option value="14">14hrs</option>
                        <option value="16">16hrs</option>
                        <option value="18">18hrs</option>
                    </select>
                </p>
                <p>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        <p> Descreva como você quer a tatuagem </p>
                    </label>
                    <textarea class="form-control" name="desc" rows="3"></textarea>
                </div>
                <p>    
                    Imagem/Foto de Referência
                    <input type="file" name="ft" id="ft">
                </p>
                <div class="alert alert-danger" role="alert">
                    Atenção dependendo do tempo da sessão a tatuatora podera mudar os dias ou o horários
                    dos proxímos agendamentos.
                </div>
                <!-- ENVIAR formulario -->
                
                <input id="cadastrar" type="submit" nome="agendar" value="AGENDAR">
            </div>
        </form>

        <div class="rodape_1">
            <?php include "rodape.php" ?>
        </div>
    </body>
</div>

</html>