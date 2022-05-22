<?php
    require("conecta.php");

    $id_imagem = 2;
    $querySelecionaPorCodigo = "SELECT codigo, imagem, nome_imagem 
    FROM tabela_imagens 
    WHERE codigo = $id_imagem";
    
    $resultado = mysqli_query($conexao, $querySelecionaPorCodigo);
    $imagem = mysqli_fetch_object($resultado);
    Header( "Content-type: image/gif");
    echo $imagem->imagem;
?>