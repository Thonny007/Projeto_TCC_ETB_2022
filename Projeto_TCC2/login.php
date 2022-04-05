<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK PARA O CSS -->
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- bot css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <!-- bot css -->
    <!-- bot js -->
    <script type="text/javascript" src="css/bootstrap/bootstrap.min.js" defer></script>
    <!-- bot js -->

    <title> Login.Ditte.Tattoo </title>
</head>
<div class="container-fluid">
    <body>
        <!-- LOGO -->
        <?php include "logo_menu.php " ?>
        <!-- LOGO -->
        <form class="form" method="POST" action="controler/processa_login.php">
        <h5> Área de Login</h5>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> LOGIN: </label>
                <input type="login" class="login" name="login" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"> SENHA: </label>
                <input type="password" class="senha" name="senha" required>
            </div>

            <button type="submit"  class="btn btn-primary"> ENTRAR </button>
        </form>
        <div class="rodape_1">
            <?php include "rodape.php" ?>
        </div>
    </body>
</div>

</html>