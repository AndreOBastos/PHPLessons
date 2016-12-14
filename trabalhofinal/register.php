<?php
	require "conexao.php";
	session_start();

	if ($conexao->connect_errno) {
		$_SESSION["registerErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
		header("Location:index.php");
	} else {
		if (!empty($_POST["login"]) AND !empty($_POST["senha"]) AND !empty($_POST["nome"])){
			if($_FILES['avatar']['tmp_name']){
				if(!$_FILES['avatar']['error'])
				{
					$temp_name = $_FILES['avatar']['tmp_name'];
					$name = $_FILES['avatar']['name'];
					$fileLocation = "img/";
					move_uploaded_file($temp_name, $fileLocation . $name);

					echo $temp_name;

					$nome = addslashes(trim($_POST["nome"]));
					$login = addslashes(trim($_POST["login"]));
					$senha = md5(trim($_POST["senha"]));
					$codigo = md5(trim($_POST["codigo"]));
					
					$sql = "INSERT INTO usuarios (nome, login, senha, avatar, codigo) VALUES ('" . $nome . "', '". $login . "', '" . $senha ."', '" . $fileLocation . $name . "', '" . $codigo . "')";
				
					if($conexao->query($sql)==TRUE){
						$_SESSION["registerSuccessMessage"] = "Usuário adicionado com sucesso.";
						header("Location:index.php");
					} else {
						$_SESSION["registerErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde." . $sql;
						header("Location:index.php");
					}
				} else {
					$_SESSION["registerErrorMessage"] = "Tivemos o seguinte problema com o arquivo escolhido: " . $_FILES['avatar']['error'];
					header("Location:index.php");
				}
			} else{
			
				$nome = addslashes(trim($_POST["nome"]));
				$login = addslashes(trim($_POST["login"]));
				$senha = md5(trim($_POST["senha"]));
				$codigo = md5(trim($_POST["codigo"]));
				
				$sql = "INSERT INTO usuarios (nome, login, senha, codigo) VALUES ('" . $nome . "', '". $login . "', '" . $senha ."',". $codigo .")";
			
				if($conexao->query($sql)==TRUE){
					$_SESSION["registerSuccessMessage"] = "Usuário adicionado com sucesso.";
					header("Location:index.php");
				} else {
					$_SESSION["registerErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
					header("Location:index.php");
				}
			}
		}
		else
		{
			$_SESSION["registerErrorMessage"] = "Você esqueceu de preencher um ou mais campos de texto.";
			header("Location:index.php");
		}
	}
?>