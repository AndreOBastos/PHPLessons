<?php
			
			const SERVIDOR = "localhost";
			const USUARIO = "root";
			const SENHA = "";
			const BD = "aula-Uweb";
			
			$conexao = new mysqli(SERVIDOR, USUARIO, SENHA, BD);

			if ($conexao->connect_errno) {
				die("Falha na conexão (" . $conexao->connect_errno . "): " . $conexao->connect_error);
			} else {
				echo "Conexão Estabelecida.";
			}
		?>