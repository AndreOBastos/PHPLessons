<?php
	require "conexao.php";

	session_start();
	if(!isset($_SESSION["idUsuario"]) OR empty($_SESSION["idUsuario"])){
		$_SESSION["loginErrorMessage"] = "Você não está logado!";
		header("Location:index.php");
	}

	$idUsuario = $_GET["id"];
	$sql = "SELECT nome, login, avatar FROM usuarios WHERE id = " . $idUsuario;

	$result = $conexao->query($sql);
			
	if ($dado = $result->fetch_array()) {
		$nomeUsuario = stripslashes($dado["nome"]);
		$loginUsuario = stripslashes($dado["login"]);
		$avatarUsuario = stripslashes($dado["avatar"]);
	}
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
					<li class="nav-item">
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
					<img src=<?php echo "'" . $avatarUsuario . "'";?> class="avatar-main img-responsive rounded img-thumbnail"><br>
					<p><strong><?php echo $nomeUsuario;?></strong></p>
					<p><?php echo $loginUsuario;?></p>
					<?php 
						$sql = "SELECT idUsuario, idSeguido FROM seguidores WHERE idUsuario = " . $_SESSION["idUsuario"] . " AND idSeguido = " . $idUsuario;
						$result = $conexao->query($sql);
	
						if ($dado = $result->fetch_array()) {
					?>
					<form method="GET" action="pararDeSeguir.php">
						<input type="hidden" name="idSeguido" value=<?php echo '"' . $idUsuario . '"';?>>
						<input type="submit" value="Parar de Seguir">
					</form>
					<?php
						} else {
					?>
					<form method="GET" action="seguir.php">
						<input type="hidden" name="idSeguido" value=<?php echo '"' . $idUsuario . '"';?>>
						<input type="submit" value="Seguir Usuário">
					</form>
					<?php
						}
					?>
				</div>
				<div class="col-xs-8 news-feed">
					<?php
						if(isset($_SESSION['followErrorMessage']) && !empty($_SESSION['followErrorMessage']))
						{
							echo "<div class='alert alert-warning' id='message'>";
							echo "<span>" . $_SESSION['followErrorMessage'] . "</span>";
							echo "</div>";
							unset($_SESSION['followErrorMessage']);
						}
						if(isset($_SESSION['followSuccessMessage']) && !empty($_SESSION['followSuccessMessage']))
						{
							echo "<div class='alert alert-success' id='message'>";
							echo "<span>" . $_SESSION['followSuccessMessage'] . "</span>";
							echo "</div>";
							unset($_SESSION['followSuccessMessage']);
						}
					?>	
					<div class="delimiter">
						<h5 class="text-muted text-center">- Mensagens enviadas pelo usuário -</h5>
					</div>
					<?php
						$sql = "SELECT mensagem, horaPostagem FROM mensagens WHERE idUsuario=". $idUsuario . " ORDER BY horaPostagem DESC";
						$result = $conexao->query($sql);

						while ($mensagens = $result->fetch_array()) {
					?>
					<div class="messageContainer">
						<div class="row">
							<div class="col-xs-3">
								<img src=<?php echo "'" . $avatarUsuario . "'";?> class="avatar-main img-responsive rounded img-thumbnail">
							</div>
							<div class="col-xs-9">
								<div class="row messageHeader">
									<p class="col-xs-6 messageName text-xs-left"><a href=<?php echo "userpage.php?id=". $idUsuario;?>><?php echo $nomeUsuario ?></a></p>
									<p class="col-xs-6 messageTime text-xs-right text-muted"><?php echo date("H:i:s - d/n/Y",strtotime($mensagens["horaPostagem"]))?></p>
								</div>
							</div>
							<div class="col-xs-9">
								<p class="messageText blockquote"><?php echo '"'.$mensagens["mensagem"].'"';?></p>
							</div>
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