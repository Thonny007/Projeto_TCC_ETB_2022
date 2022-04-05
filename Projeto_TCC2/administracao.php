<?php include "logo_menu.php"?>
<?php<!-- /* 
	if ($_SESSION["id_adm"] == "adm	"){ */ -->
?>	
<ul>		
	<li> <a href="administracao.php" > Adminitração </a> </li>
	<li> <a href="lista_cadastro.php" > Cadastros </a> </li>
	<li> <a href="lista_agendamentos" > Agendamento </a> </li>
	
</ul>
<?php
 }
 //else if ($_SESSION["id_cliente"] == "cliente"){
?>
<ul>
	<!-- lista o agendamento do cliente-->
	<li><a href="lista_agendamento"></a></li>
    <li> <a href="agendamento.php" > Agendar Tattoo </a> </li>  
    <li> <a href="orçamento.php"> Orçamento </li>
</ul>
<?php 
 }

 /*else { */
?> 
<!--
 <ul>		
	<li> <a href="administracao.php" > AdminitraAdminitração </a> </li>
	<li> <a href="vendas.php" > Vendas </a> </li>
</ul>
</*?php
}

?>
-->
