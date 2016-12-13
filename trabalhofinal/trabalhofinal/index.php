<?php
	session_start();
?>
<html>
	<head>
		<title>
			Trabalho Final - PHP
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
		<script
			  src="https://code.jquery.com/jquery-3.1.1.js"
			  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
			  crossorigin="anonymous"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#logar").click(function(){
					$("#LoginForm").show();
					$("#RegisterForm").hide();
					$("#logar").addClass("active");
					$("#registrar").removeClass("active");
				});
				$("#registrar").click(function(){
					$("#LoginForm").hide();
					$("#RegisterForm").show();
					$("#logar").removeClass("active");
					$("#registrar").addClass("active");
				});
			});	
		</script>

		<style type="text/css">
			html, body, .container{
				height:100%;
			}
			.absolute-center{
				margin:auto;
				position:absolute;
				top:0; left:0; bottom:0; right:0;
			}
			.absolute-Center.is-Responsive{
				width:50%;
				height:45%;
				min-width:200px;
				max-width:400px;
				padding:30px;
			}
			.formDiv{
				background-color: #c7c5bf;
				border-radius: 34px 34px 34px 34px;
    			-moz-border-radius: 34px 34px 34px 34px;
				-webkit-border-radius: 34px 34px 34px 34px;
				border: 2px solid #949494;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-light bg-faded">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">TwitterClone</a>
				</div>
				<div class="nav navbar-nav">
					<a class="nav-item nav-link active" href="#" id="logar">Logar</a>
					<a class="nav-item nav-link" href="#" id="registrar">Registrar</a>
				</div>
			</div>					
		</nav>
		<div class="container">
			<div class="row">
				<?php
					if(isset($_SESSION["loginErrorMessage"])){
						echo "<div class="col-md-12 alert alert-warning" id="message">";
						echo "<span>" . $_SESSION["loginErrorMessage"] . "</span>";
						echo "</div>";
					}
					if(isset($_SESSION["registerErrorMessage"])){
						echo "<div class="col-md-12 alert alert-warning" id="message">";
						echo "<span>" . $_SESSION["loginErrorMessage"] . "</span>";
						echo "</div>";
					}
					if(isset($_SESSION["registerSuccessMessage"])){
						echo "<div class="col-md-12 alert alert-success" id="message">";
						echo "<span>" . $_SESSION["loginErrorMessage"] . "</span>";
						echo "</div>";
					}
				?>	
				<div id="LoginForm" class="absolute-Center is-Responsive formDiv" style="display:block;">
					<form class="form" method="POST" action="mainPage.php">
						<label for="LoginForm"><strong>Preencha abaixo para realizar o login</strong></label>
						<div class="form-group">
							<label for="login">Login:</label><br>
							<input type="text" name="login" id="login" required>
						</div>
						<div class="form-group">
							<label for="senha">Senha:</label><br>
							<input type="password" name="senha" id="senha" required>
						</div>
						<input type="submit" name="submitButton">
					</form>
				</div>
				<div id="RegisterForm" class="absolute-Center is-Responsive formDiv" style="display:none;">
					<form method="POST" action="register.php">
						<label for="RegisterForm"><strong>Preencha abaixo para se registrar</strong></label>
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
						<input type="submit" name="submitButton">
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