<?php 

define("dbName", "nypyme");
define("dbUser", "root");
define("dbPassword", "123456");
define("dbHost", "localhost");

mysqli_report(MYSQLI_REPORT_STRICT);
	function abrirConexao() {
		try {
			$conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				return $conexao;
			} catch (Exception $erro) {
				echo $erro->getMessage();
				return null;
			}
		}

	function fecharConexao($conexao) {
		try {
			mysqli_close($conexao);
		} catch (Exception $e) {
			echo $e->getMessage();
		}		
	}

 ?>

 ?>