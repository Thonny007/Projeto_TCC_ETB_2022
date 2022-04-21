<?php
	session_start();

	if (isset($_SESSION['nome']) && isset($_SESSION['adm'])) {
		var_dump($_SESSION['nome']);
		var_dump($_SESSION['adm']);
	} else {
		echo "must be logged";
	}
	

	/* echo "<script> 
			alert ('Você não está logado!!!') 
		  </script>";
		
	echo "<script> 
			location.href = ('index.php') 
		  </script>"; */
?>