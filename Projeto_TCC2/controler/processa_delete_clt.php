<?php 
	session_start ();
?>
<?php
    $con = mysqli_connect("localhost", "root", "", "agendamentos");
    
    /* $id = $_GET["id"];
    $sql_pesquisa = "SELECT  id_clt,nome_clt, login_clt, senha_clt
                        FROM cliente
                    
                     WHERE id_clt = '$id'";
    $resultado_pesquisa = mysqli_query ($con, $sql_pesquisa);	
    
    $registro = mysqli_fetch_row($resultado_pesquisa); */
    $sql_delete = "DELETE   FROM  cliente
                    WHERE 
                        id_clt = '$id'";
    $sql_resultado_delete = mysqli_query ($con, $sql_delete);
		
                if ($sql_resultado_delete == true)
                {
                    echo "<script>
                            alert ('Registro Deletado/Apagado com Sucesso') 
                          </script>";
                    echo "<script> 
                             location.href = ('../lista_cadastro.php') 
                          </script>";
                    exit();
                }  
                else
                {    
                    echo "<script> 
                            alert ('ERRO AO DELETAR DADO') 
                        </script>";
                    echo "<script> 
                            location.href ('../lista_cadastro.php') 
                         </script>";
                    exit();
                }
    







?>