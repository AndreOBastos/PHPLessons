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

					<?php
						echo "Minha cor favorita é: " . $_SESSION['favcolor'] . ".";
						echo "Meu animal favorito é: " . $_SESSION['favanimal'] . ".";
					?>

				</div>
			</div>
		</div>
	</body>
</html>

<?php
	session_unset();
	session_destroy();
?>