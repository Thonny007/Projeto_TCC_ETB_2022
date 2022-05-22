<?php session_start(); ?>
<?php include_once "classes/cliente.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/altera_adm.css">
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
    </style>
</head>
<body>
    <?php
        include "controler/valida_login.php";
        include "menu_entrada_clt.php";
    ?>
    <?php
        if (!$_SESSION['adm']) {
            $registro = cliente::getById($_SESSION["id"]);
        } else {
            $id_cliente = $_GET["id_cliente"];
            $registro = Cliente::getById($id_cliente);
        }
    ?>
    <div id="funcionalidade" class="div_direita">
        <form method="post" action="controler/processa_altera_clt.php">
            <?php if ($registro != null) { ?>
                <div class="container">
                    <form>
                        <input type="hidden" name="id" value="<?php echo $registro[0] ?>">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome" value="<?php echo $registro[1] ?>">
                        </div>
                        <div class="form-group">
                            <label>Data de Nascmento</label>
                            <input type="date" class="form-control" name="data_nasc" value="<?php echo $registro[4]; ?>">
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
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="<?php echo $registro[7] ?>" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                        </div>
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" class="form-control" name="login" value="<?php echo $registro[2] ?>">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha" value="<?php echo $registro[3] ?>">
                        </div>
                        <button type="submit" class="btn btn-danger">alterar</button>
                    </form>
                </div>
            <?php
                }else {
                    echo "alert(' erro ao consultar ')";
                }
            ?>
        </form>
    </div>
</body>
</html>