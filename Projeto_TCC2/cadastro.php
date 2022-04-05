<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <!-- bot css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <!-- bot css -->
    <!-- bot js -->
    <script type="text/javascript" src="css/bootstrap/bootstrap.min.js" defer></script>
    <!-- bot js -->
    <title> Cadastro.Ditte.Tattoo </title>
</head>
<div class="container-fluid">

    <body>
        <?php include "logo_menu.php" ?>
        <div class="fomulario_cadastro">
            <form method="POST" action="controler/processa_cadastro.php">
                <h3> CADASTRO </h3>

                <p>
                    Nome Completo:
                    <input id="nome" type="text" name="nome" required>
                </p>
                <p>
                    Data de Nascimento:
                    <input id="data_nasc" type="date" name="data_nasc" required>
                </p>
                <p>
                    Telefone para Contado:
                    <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxxxxxxx" required>
                </p>
                <p>
                    LOGIN:
                    <input id="login" type="text" name="login" placeholder="EX: abcd@123" required>
                </p>
                <p>
                    SENHA:
                    <input id="senha" type="password" name="senha" placeholder="Minino 6(seis Caracteres)" required>
                </p>
                <!-- ENVIAR formulario -->
                <input id="cadastrar" type="submit" nome="cadastrar" value="cadastrar">
            </form>
        </div>
        <div class="rodape_1">
            <?php include "rodape.php" ?>
        </div>
    </body>
</div>

</html>