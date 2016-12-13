<?php
	require "conexao.php";
	session_start();

	if($conexao->connect_errno){
		$_SESSION["loginErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
		header("Location:index.php");
	} else {
		if (!empty($_POST["login"]) AND !empty($_POST["senha"])) {
			$login = addslashes(trim($_POST["login"]));
			$senha = md5(trim($_POST["senha"]));

			$sql = "SELECT id, nome, login, avatar FROM usuarios WHERE login='" . $login . "' AND senha='" . $senha . "'";
			$result = $conexao->query($sql);
			

			if ($dado = $result->fetch_array()) {
				$_SESSION["idUsuario"] = $dado["id"];
				$_SESSION["nomeUsuario"] = stripslashes($dado["nome"]);
				$_SESSION["loginUsuario"] = stripslashes($dado["login"]);
				$_SESSION["avatarUsuario"] = stripslashes($dado["avatar"]);
				header("Location:mainPage.php");
			} else {
				$_SESSION["loginErrorMessage"] = "Esse usuário não existe, ou a sua senha está incorreta." . $dado['nome'];
				header("Location:index.php");
			}
			
		} else {
			$_SESSION["loginErrorMessage"] = "Você esqueceu de preencher uma ou mais partes do formulário!";
			header("Location:index.php");
		}
		
	}

?>