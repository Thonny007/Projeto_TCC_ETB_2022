<?php session_start(); ?>
<?php include_once "../classes/cliente.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/altera_adm.css">
    <script src="../js/mascara_telefone.js" defer></script>
    <title> Altera.Cadastro.Dite.Tattoo </title>
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
<div class="container-fluid">
<body>
    <?php
        include "../controler/valida_login.php";
        include "../menus/menu_entrada.php";
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
        <form method="post" action="../controler/processa_altera_clt.php">
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
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telefone" onkeyup="mask(this, mphone)" value="<?php echo $registro[7] ?>">
                        </div>
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" class="form-control" name="login" value="<?php echo $registro[2] ?>">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha" value="<?php echo $registro[3] ?>">
                        </div>
                        <button type="submit" class="btn btn-danger">ALTERAR</button>
                    </form>
                    <p></p>
                </div>
            <?php
                }else {
                    echo "alert(' erro ao consultar ')";
                }
            ?>
        </form>
    </div>
</body>
            </div>
</html>