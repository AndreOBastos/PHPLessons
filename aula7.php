<?php
	session_start();
?>
<html>
	<head>
		<title>
			Aula 7 - PHP
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-offset-2 col-xs-8">
				<!--
					<?php
						$_SESSION['favcolor'] = "green";
						$_SESSION['favanimal'] = "cat";
						echo "Session variables ar set.";
					?>
				-->
					<form class="form" action="form/form_login.php" method="POST">
						<div class="form-group">
							<label for="login">Login:</label><br>
							<input type="text" name="usuario" required><br>
							<label for="senha">Senha:</label><br>
							<input type="password" name="senha" required><br>
							<input type="submit" name="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>