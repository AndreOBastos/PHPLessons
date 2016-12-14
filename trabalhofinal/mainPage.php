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
		<script
			src="https://code.jquery.com/jquery-3.1.1.js"
			integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
			crossorigin="anonymous">
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("textarea").keyup(updateCount);
				$("textarea").keydown(updateCount);
				$("textarea").on('input', updateCount);

				function updateCount(){
					var cs = "Número de caracteres restantes: " + [300 - $(this).val().length];
					$("#messageCounter").text(cs);
				}
			});
		</script>
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
					<img src=<?php echo "'" . $avatarLocation . "'";?> class="avatar-main img-responsive rounded img-thumbnail" width="200px" height="200px"><br>
					<p><strong><?php echo $nomeUsuario;?></strong></p>
					<p><?php echo "- " . $loginUsuario;?></p>
				</div>
				<div class="col-xs-8 news-feed">
					<?php
						if(isset($_SESSION['postErrorMessage']) && !empty($_SESSION['postErrorMessage']))
						{
							echo "<div class='alert alert-warning' id='message'>";
							echo "<span>" . $_SESSION['postErrorMessage'] . "</span>";
							echo "</div>";
							unset($_SESSION['postErrorMessage']);
						}
						if(isset($_SESSION['postSuccessMessage']) && !empty($_SESSION['postSuccessMessage']))
						{
							echo "<div class='alert alert-success' id='message'>";
							echo "<span>" . $_SESSION["postSuccessMessage"] . "</span>";
							echo "</div>";
							unset($_SESSION['postSuccessMessage']);
						}
					?>	
					<div class="formMessage">
						<form class="form" method="POST" action="postmessage.php">
							<div class="form-group">
								<label for="message">Escreva a mensagem que deseja enviar:</label>
								<textarea class="form-control" rows="4" name="mensagem" required></textarea>
								<div style="display:flex; justify-content: space-between;">
									<button type="submit" name="sendMessage">Enviar Mensagem</button>
									<span id="messageCounter">Número de caracteres restantes: 300</span>
								</div>
							</div>
						</form>
					</div>
					<div class="delimiter">
						<h5 class="text-muted text-center">- Mensagens dos usuários que você segue -</h5>
					</div>
					<?php
						$sql = "SELECT mensagens.idUsuario, mensagens.mensagem, mensagens.horaPostagem, usuarios.nome, usuarios.avatar, usuarios.login FROM seguidores, mensagens, usuarios WHERE mensagens.idUsuario=seguidores.idSeguido AND seguidores.idUsuario='". $idUsuario . "' AND usuarios.id=seguidores.idSeguido ORDER BY mensagens.horaPostagem DESC";
						$result = $conexao->query($sql);

						while ($mensagens = $result->fetch_array()) {
					?>
					<div class="messageContainer">
						<div class="row">
							<div class="col-xs-3">
								<img src=<?php echo "'" . $mensagens["avatar"] . "'";?> class="avatar-main img-responsive rounded img-thumbnail">
							</div>
							<div class="col-xs-9">
								<div class="row messageHeader">
									<div class="col-xs-6 messageName text-xs-left"><a href=<?php echo "userpage.php?id=". $mensagens["idUsuario"];?>><?php echo $mensagens["nome"] ?></a><p class="text-muted"><?php echo $mensagens["login"] ?></p> </div>
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