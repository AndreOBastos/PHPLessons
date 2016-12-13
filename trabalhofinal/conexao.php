<?php
	const SERVIDOR = "localhost";
	const USUARIO = "root";
	const SENHA = "";
	const BD = "trabalhoFinal";
	
	$conexao = new mysqli(SERVIDOR, USUARIO, SENHA, BD);

	if ($conexao->connect_errno) {
		die("Falha na conexão (" . $conexao->connect_errno . "): " . $conexao->connect_error);
	}
?>