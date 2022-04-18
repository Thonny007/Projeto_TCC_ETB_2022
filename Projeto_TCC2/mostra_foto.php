<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .carrega-imagem{
            max-width: 1000px;
            max-height: 1000px;
            margin: auto;
            margin-top: 50px;
            text-align: center;
        }
        
        .carrega-imagem img{
            max-width: 100%;
        }
    </style>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        $querySelecionaPorCodigo = "SELECT imagem_atendimento FROM agendamento WHERE id_agnd = $id";
        $resultado = mysqli_query($con, $querySelecionaPorCodigo);
        $imagem = mysqli_fetch_row($resultado);

    ?>
    <div class="carrega-imagem">
        <img src="data:image/jpeg;base64,<?= base64_encode($imagem[0]) ?>" />
        <button>
            <a href="data:image/jpeg;base64,<?= base64_encode($imagem[0]) ?>" download>
                Download
            </a>
        </button>
    </div>
</body>
</html>
