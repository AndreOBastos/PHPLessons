<?php

require "conexao.php";
session_start();

if ($conexao->connect_errno) {
	$_SESSION["registerErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
	header("Location:index.php");
} else {
	if(!isset($_POST["id"]) AND !isset($_POST["senha"])){
		$_SESSION["registerErrorMessage"] = "Por favor, insira uma nova senha.";
		header("Location:index.php");
	} else {
		$nova_senha = md5(trim($_POST["senha"]));
		$sql = "UPDATE usuarios SET senha ='" . $nova_senha . "' WHERE id=" . $_POST["id"];
		if($conexao->query($sql)==TRUE){
			$_SESSION["registerSuccessMessage"] = "Sua senha foi alterada com sucesso.";
			header("Location:index.php");
		} else {
			$_SESSION["registerErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
			header("Location:index.php");
		}
	}
}
?>