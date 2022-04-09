<?php
	if ( isset($_SESSION["login_clt"]) ) {
		
		echo $_SESSION["nome_clt"];
		
	}else if ( isset($_SESSION["login_adm"]) ) {
		
		echo $_SESSION["nome_adm"];

    }
    else {
	
		echo "<script> 
				alert ('Você não está logado!!!') 
			  </script>";
			
		echo "<script> 
				location.href = ('index.php') 
			  </script>";
	}
?>