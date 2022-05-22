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
    <title> Altera.Cadastro.Ditte.Tattoo </title>
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
        include "controler/valida_login.php";
        include "menu_entrada.php";
        include_once "classes/cliente.php";
    ?>
    <div id="funcionalidade" class="div_direita">
        <?php
            $cod = $_GET["id"];
            $cliente = Cliente::getById($cod);
        ?>
        <button class="btn btn-dark">
            <a href="lista_cadastro.php">Listar Cliente Cadastros</a>
        </button>
        <form action="controler/processa_altera_clt.php" method="post">
            <input width="30%" type="hidden" name="id" value="<?php echo $cliente[0] ?>">
            <div class="form-group">
                <label for="nome"> Nome </label>
                <input type="text" class="form-control" name="nome" value="<?php echo $cliente[1] ?>">
            </div>
            <div class="form-group">
                <label for="data_nasc">Data de Nascmento</label>
                <input type="date" class="form-control" name="data_nasc" value="<?php echo $cliente[4]; ?>">
            </div>
            <div class="form-group">
                <!-- ++++++++++++++++++++++++++++++++++++ MASCARA DE TELEFONE ++++++++++++++++++++++++++++++++++++ -->
                <script>
                    function mask(o, f) {
                        setTimeout(function() {
                            var v = mphone(o.value);
                            if (v != o.value) {
                                o.value = v;
                            }
                        }, 1);
                    }
                    function mphone(v) {
                        var r = v.replace(/\D/g, "");
                        r = r.replace(/^0/, "");
                        if (r.length > 10) {
                            r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                        } else if (r.length > 5) {
                            r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                        } else if (r.length > 2) {
                            r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                        } else {
                            r = r.replace(/^(\d*)/, "($1");
                        }
                            return r;
                    }
                </script>
                <label> Telefone </label>
                <input type="text" class="form-control" name="telefone" value="<?php echo $cliente[7] ?>" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
            </div>
            <div class="form-group">
                <label> Login </label>
                <input type="text" class="form-control" name="login" value="<?php echo $cliente[2] ?>">
            </div>
            <div class="form-group">
                <label for="senha"> Senha </label>
                <input type="password" class="form-control" name="senha" value="<?php echo $cliente[3] ?>">
            </div>
            <p></p>
            <button type="submit" class="btn btn-danger"> Alterar Usuário</button>
            <hr>
        </form>
    </body>
</div>
</html>