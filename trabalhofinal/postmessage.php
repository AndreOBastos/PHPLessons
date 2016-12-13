<?php
	require "conexao.php";
	session_start();

	if ($conexao->connect_errno) {
		$_SESSION["postErrorMessage"] = "Tivemos problemas no envio da sua mensagem. Tente novamente mais tarde.";
		header("Location:mainPage.php");
	} else {
		$mensagem = $_POST["mensagem"];
		date_default_timezone_set("America/Fortaleza");
		$horaPostagem = date('Y-m-d H:i:s');

		$sql = "INSERT INTO mensagens (idUsuario, mensagem, horaPostagem) VALUES (" . $_SESSION["idUsuario"] . ", '" . $mensagem . "', '". $horaPostagem ."')";

		if($conexao->query($sql)==TRUE){
			$_SESSION["postSuccessMessage"] = "Mensagem enviada com sucesso.";
			header("Location:mainPage.php");
		} else {
			$_SESSION["postErrorMessage"] = "Tivemos problemas no envio da sua mensagem. Tente novamente mais tarde." . $sql;
			header("Location:mainPage.php");
		}
	}

?>