<?php
/*  include_once "classe/Agendamento.php"; */
?>
<div id="funcionalidade" class="div_direita">						
<?php   
    $con = mysqli_connect ("localhost", "root", "", "agendamentos");
    $id_agnd = $_GET["id_agnd"];
    $sql_pesquisa_agnd = "SELECT id_agnd, data_agnd, imagem_atendimento ,status_agnd, descricao_tatto
                                FROM agendamento
                             WHERE id_agnd = '$id_agnd'";
   $resultado_pesquisa_agnd = mysqli_query ($con,$sql_pesquisa_agnd);

   $registro_agnd = mysqli_fetch_row($resultado_pesquisa_agnd);
   ?>
   <table class="esquerda">
       <tr>
           <td colspan="2">
               <p> <?php echo "$registro_agnd[0]"; ?></p>
           </td>							
       <tr>
   </table>							
</div>		
