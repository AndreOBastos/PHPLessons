<?php
	require "conexao.php";
	session_start();

	$idUsuario = $_SESSION["idUsuario"];
	$idSeguido = $_GET["idSeguido"];
	$location = 'Location: userpage.php?id=' . $idSeguido;

	if($conexao->connect_errno){
		$_SESSION["followErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
		header($location);
	} else {
		$sql = "INSERT INTO seguidores (idUsuario, idSeguido) VALUES (" . $idUsuario . "," . $idSeguido . ")";

		echo $sql;

		if($conexao->query($sql)==TRUE){
			$_SESSION["followSuccessMessage"] = "Você agora está seguindo esse usuário.";
			header($location);
		} else {
			$_SESSION["followErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
			header($location);
		}
	}

?>