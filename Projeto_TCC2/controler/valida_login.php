<?php
	/* session_start(); */

	if (isset($_SESSION['nome']) && isset($_SESSION['adm'])) {
		/* var_dump($_SESSION['nome']); */
/* 		var_dump($_SESSION['adm']); */
	} else {
		/* echo "must be logged"; */
		echo "<script>
                alert ('🚷⚠️ Acesso Negado 🚷⚠️')
					location.href = ('../Projeto_TCC2/index.php')
             </script>";
		exit();
	}
?>