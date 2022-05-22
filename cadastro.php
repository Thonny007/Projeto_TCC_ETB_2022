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
            <div style="opacity:100%;" class="alert alert-warning" role="alert">
                <strong> É Necessário Estar Conectado no Sistema para Realiza o Agendamento </strong>
            </div>
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
                Telefone para Contado:
                <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxxxxxxx" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" required>
            </p>
            <p>
                LOGIN/Nome de Úsuario:
                <input id="login" type="text" name="login" placeholder="EX: abcd@123" required>
            </p>
            <p>
                SENHA:
                <input id="senha" type="password" name="senha" placeholder="mínimo 6(seis Caracteres)" required>
            </p>
            <!-- ENVIAR formulario -->
            <input id="cadastrar" type="submit" name="cadastrar" value="cadastrar">
        </form>
    </div>
    <div class="rodape_1">
        <?php include "rodape.php" ?>
    </div>
    </body>
</div>

</html>