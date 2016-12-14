<?php

require "conexao.php";
session_start();

if ($conexao->connect_errno) {
	$_SESSION["registerErrorMessage"] = "Problemas de conexão com o banco de dados. Tente novamente mais tarde.";
	header("Location:index.php");
} else {
	if(!isset($_POST["nome"]) AND !isset($_POST["codigo"])){
		$_SESSION["registerErrorMessage"] = "Insira os dados corretamente para alterar sua senha.";
		header("Location:index.php");
	} else {
		$nome = addslashes(trim($_POST["nome"]));
		$codigo = md5(trim($_POST["codigo"]));
		$sql = "SELECT id FROM usuarios WHERE login='" . $nome . "' AND codigo='" . $codigo . "'";
		$result = $conexao->query($sql);

		if (!($dado = $result->fetch_array())) {
			$_SESSION["registerErrorMessage"] = "Não existe nenhum usuário com essa combinação de usuário e código." . $sql;
			header("Location:index.php");
		} else {
?>
<!DOCTYPE html>
<html class="index">
	<head>
		<title>
			Trabalho Final - PHP
		</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
		<script
			  src="https://code.jquery.com/jquery-3.1.1.js"
			  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
			  crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=PT+Sans|Ubuntu" rel="stylesheet">  
	</head>
	<body class="index">
		<nav class="navbar navbar-light bg-faded">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">TwitterClone</a>
				</div>
			</div>					
		</nav>
		<div class="container-index">
			<div class="row row-full">
				<div id="AlteraForm" class="col-md-4 col-md-offset-4 centerBlock formStyle" style="display:block;">
					<form class="form" method="POST" action="alterar-senha.php">
						<div class="form-group">
							<label for="senha">Nova Senha:</label><br>
							<input type="password" name="senha" id="senha" required><br>
							<input type="hidden" name="id" value=<?php echo $dado["id"];?>>
						</div>
						<div class="form-group button-group">
							<button type="submit" name="submitButton">Completar Alteração</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
		}
	}
}

?>