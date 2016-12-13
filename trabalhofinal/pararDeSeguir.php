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
		$sql = "DELETE FROM seguidores WHERE idUsuario=" . $idUsuario . " AND idSeguido=" . $idSeguido;

		echo $sql;

		if($conexao->query($sql)==TRUE){
			$_SESSION["followSuccessMessage"] = "Você agora parou de seguir esse usuário.";
			header($location);
		} else {
			$_SESSION["followErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
			header($location);
		}
	}

?>