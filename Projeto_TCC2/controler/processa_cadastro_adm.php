<?php

	//1.Estabelecer uma conexao com o BD
	$conectar = mysqli_connect("localhost", "root", "","agendamentos");

	//2.Receber nome,função,login e senha
	$nome = $_POST["nome"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];


	//3.Pesquisar no banco de dados se já existe o login que foi recebido
	$sql_consulta = "SELECT login_adm 
                        FROM 
                            administrador
                        WHERE 
                            login_adm = '$login'";

	$resultado_consulta = mysqli_query($conectar, $sql_consulta);

	$linhas = mysqli_num_rows ($resultado_consulta);

	if($linhas==1){

		echo "<script>
				alert('⚠️ Login já cadastrado.Tente outro! ⚠️'')
			</script>";

		echo "<script>
				locale.href = ('../cadastro_adm.php')
			</script>";
	}

	else{ //Para o usuário que nao existe.

		$sql_cadastrar = "INSERT INTO 
                                administrador
								(nome_adm, login_adm,senha_adm) 
							VALUES 
								('$nome','$login','$senha')";

		$resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);

		if ($resultado_cadastrar== true) {
			echo "<script>

					alert ('☺ $nome Cadastrado Com Sucesso ☺')

				</script>";

			echo "<script>
					location.href = ('../cadastro_adm.php');
				</script>";

		}

		else{

			echo "<script>
					alert ('⚠️⚠️ Ocorreu um erro no servidor. Tente novamente ⚠️⚠️')
				</script>";

			echo "<script> 
					location.href = ('../cadastro_adm.php')
				</script>";	


		}
	}



?>