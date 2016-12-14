<?php
	session_start();
?>
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
		<script type="text/javascript" src="js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=PT+Sans|Ubuntu" rel="stylesheet">  
	</head>
	<body class="index">
		<nav class="navbar navbar-light bg-faded">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">TwitterClone</a>
				</div>
				<div class="nav navbar-nav">
					<a class="nav-item nav-link active" href="#" id="logar">Logar</a>
					<a class="nav-item nav-link" href="#" id="registrar">Registrar</a>
					<a class="nav-item nav-link" href="#" id="esqueci">Esqueci Minha Senha</a>
				</div>
			</div>					
		</nav>
		<div class="container-index">
			<div class="row row-full">
				<?php
					if(isset($_SESSION['loginErrorMessage']) && !empty($_SESSION['loginErrorMessage']))
					{
						echo "<div class='col-md-12 alert alert-warning' id='message'>";
						echo "<span class='text-xs-center'>" . $_SESSION['loginErrorMessage'] . "</span>";
						echo "</div>";
					}
					if(isset($_SESSION['registerErrorMessage']) && !empty($_SESSION['registerErrorMessage']))
					{
						echo "<div class='col-md-12 alert alert-warning' id='message'>";
						echo "<span class='text-xs-center'>" . $_SESSION["registerErrorMessage"] . "</span>";
						echo "</div>";
					}
					if(isset($_SESSION['registerSuccessMessage']) && !empty($_SESSION['registerSuccessMessage']))
					{
						echo "<div class='col-md-12 alert alert-success' id='message'>";
						echo "<span class='text-xs-center'>" . $_SESSION["registerSuccessMessage"] . "</span>";
						echo "</div>";
					}
				?>	
				<div id="LoginForm" class="col-md-4 col-md-offset-4 centerBlock formStyle" style="display:block;">
					<form class="form" method="POST" action="login.php">
						<label class="title-label" for="LoginForm"><strong>Preencha abaixo para realizar o login</strong></label>
						<div class="form-group">
							<label for="login">Login:</label><br>
							<input type="text" name="login" id="login" required>
						</div>
						<div class="form-group">
							<label for="senha">Senha:</label><br>
							<input type="password" name="senha" id="senha" required><br>
							<a href="#" id="esqueciLink">Esqueci minha senha</a>
						</div>
						<div class="form-group button-group">
							<button type="submit" name="submitButton">Realizar Login</button>
						</div>
					</form>
				</div>
				<div id="RegisterForm" class="col-md-4 col-md-offset-4 centerBlock formStyle" style="display:none;">
					<form method="POST" action="register.php" enctype="multipart/form-data">
						<label class="title-label" for="RegisterForm"><strong>Preencha abaixo para se registrar</strong></label>
						<div class="form-group">
							<label for="nomeRegister">Seu Nome:</label><br>
							<input type="text" name="nome" id="nomeRegister" required>
						</div>
						<div class="form-group">
							<label for="loginRegister">Login Desejado:</label><br>
							<input type="text" name="login" id="loginRegister" required>
						</div>
						<div class="form-group">
							<label for="senhaRegister">Senha Desejada:</label><br>
							<input type="password" name="senha" id="senhaRegister" required>
						</div>
						<div class="form-group">
							<label for="senhaRegister">Código de 4 números para recuperação de senha:</label><br>
							<input type="password" name="codigo" id="codigoRegister" maxlength="4" pattern="[0-9]*" required>
						</div>
						<div class="form-group">
							<label for="avatarRegister">Escolha uma imagem para ser o seu avatar:</label><br>
							<input type="file" name="avatar" id="avatarRegister" accept="image/*">
						</div>
						<div class="form-group button-group">
							<button type="submit" name="submitButton">Registrar Usuário</button>
						</div>
					</form>
				</div>
				<div id="EsqueciForm" class="col-md-4 col-md-offset-4 centerBlock formStyle" style="display:none;">
					<form method="POST" action="esqueci-senha.php" enctype="multipart/form-data">
						<label class="title-label" for="RegisterForm"><strong>Preencha abaixo para alterar sua senha</strong></label>
						<div class="form-group">
							<label for="nomeEsqueci">Seu Login:</label><br>
							<input type="text" name="nome" id="nomeEsqueci" required>
						</div>
						<div class="form-group">
							<label for="senhaEsqueci">Código de 4 números para recuperação de senha:</label><br>
							<input type="password" name="codigo" id="codigoEsqueci" maxlength="4" pattern="[0-9]*" required>
						</div>
						<div class="form-group button-group">
							<button type="submit" name="submitButton">Alterar Senha</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<?php

	session_unset();
	session_destroy();
?>
