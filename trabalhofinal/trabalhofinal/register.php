<?php
	require "conexao.php";
	session_start();

	if ($conexao->connect_errno) {
		$_SESSION["registerErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde."
		header("Location:index.php");
	} else {
		if (!empty($_POST["login"]) AND !empty($_POST["senha"]) AND !empty($_POST["nome"])){
			
			$nome = addslashes(trim($_POST["nome"]));
			$login = addslashes(trim($_POST["login"]));
			$senha = md5(trim($_POST["nome"]));
			
			$sql = "INSERT INTO usuarios (nome, login, senha) VALUES ('" . $nome . "', '". $login . "', '" . $senha ."')";
		
			if($conexao->query($sql)==TRUE){
				$_SESSION["registerSuccessMessage"] = "Usuário adicionado com sucesso.";
				header("Location:index.php");
			} else {
				$_SESSION["registerErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde."
				header("Location:index.php");
			}
		}
		else
		{
			$_SESSION["registerErrorMessage"] = "Você esqueceu de preencher um ou mais campos de texto."
			header("Location:index.php");
		}
	}
?>