<?php
	require "conexao.php";

	session_start();
	if(!isset($_SESSION["idUsuario"]) OR empty($_SESSION["idUsuario"])){
		$_SESSION["loginErrorMessage"] = "Você não está logado!";
		header("Location:index.php");
	}

	$idUsuario = $_SESSION["idUsuario"];
	$nomeUsuario = $_SESSION["nomeUsuario"];
	$loginUsuario = $_SESSION["loginUsuario"];
	$avatarLocation = $_SESSION["avatarUsuario"];
?>

<html>
	<head>
		<title>
			Trabalho Final - PHP
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet"> 
	</head>
	<body>
		<nav class="navbar navbar-light bg-faded">
			<div class="container">
				<ul class="nav navbar-nav">
					<li class="navbar-header">
						<a class="navbar-brand" href="mainPage.php">TwitterClone</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="users.php" id="usuariosNavBar">Usuários</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="seguidores.php" id="seguidoresNavBar">Seguidores</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="seguido.php" id="seguidosNavBar">Seguidos</a>
					</li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li class="nav-item">
						<a class="nav-link pull-right" href="disconnect.php" id="desconectarNavBar">Desconectar</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-xs-2 profile">
					<img src=<?php echo "'" . $avatarLocation . "'";?> class="avatar-main img-responsive rounded img-thumbnail"><br>
					<h4><strong><?php echo $nomeUsuario;?></strong></h4>
					<p><?php echo "- " . $loginUsuario;?></p>
				</div>
				<div class="col-xs-8 news-feed">
					<?php 
						$sql = "SELECT usuarios.id, usuarios.login, usuarios.nome, usuarios.avatar FROM usuarios,seguidores WHERE seguidores.idUsuario=usuarios.id AND seguidores.idSeguido=" . $idUsuario;
						$results = $conexao->query($sql) or trigger_error($conexao->error."[$sql]");;

						while ($usuarios = $results->fetch_array()) {
					?>
					<div class="messageContainer row vertical-align">
						<div class="col-xs-3">
							<img src=<?php echo "'" . $usuarios["avatar"] . "'" ?> class="avatar-main img-responsive rounded img-thumbnail">
						</div>
						<div class="col-xs-9">
							<span><a href=<?php echo "userpage.php?id=". $usuarios["id"];?>><?php echo $usuarios["nome"] ?></a> - </span>
							<span class="text-muted"><?php echo $usuarios["login"] ?></span>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>