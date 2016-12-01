<?php
	$cookie_name = "usuario";
	$cookie_value = "Gabriel Gomes";
	//setcookie($cookie_name,$cookie_value,time() + (60*60*24*30), "/");
?>

<html>
	<head>
		<title>
			Aula 6 - PHP
		</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div style="border:1px black solid; margin:20px; padding:20px; display:inline-block;">
					<h1>GET</h1>
					<!--
						Form antigo
						<form action="form/formGet.php" method="GET">
					-->
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
						<label for="Nome">Nome:</label><br>
						<input type="text" name="nome"><br>
						<label for="Sobrenome">Sobrenome:</label><br>
						<input type="text" name="sobrenome"><br>
						<input type="submit">
					</form>
				</div>
				<div style="border:1px black solid; margin:20px; padding:20px; display:inline-block;">
					<h1>POST</h1>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
						<label for="Nome">Nome:</label><br>
						<input type="text" name="nome"><br>
						<label for="Sobrenome">Sobrenome:</label><br>
						<input type="text" name="sobrenome"><br>
						<input type="submit">
					</form>
				</div>
				<!--
				<div>
					<h1>POST RESULTS</h1>
					<?php
						if(isset($_POST['nome']) AND isset($_POST['sobrenome'])){
							$nome_post=$_POST['nome'];
							$sobrenome_post=$_POST['sobrenome'];
							if(empty($nome_post) or empty($sobrenome_post)){
								echo "Nome está vazio no POST!";
							} else {
								echo $nome_post." ".$sobrenome_post;
							}
						}
					?>
				</div>
				<div>
					<h1>GET RESULTS</h1>
					<?php
						if(isset($_GET['nome']) AND isset($_GET['sobrenome'])){
							$nome_get=$_GET['nome'];
							$sobrenome_get=$_GET['sobrenome'];
							if(empty($nome_get) or empty($sobrenome_get)){
								echo "Nome está vazio no GET!";
							} else {
								echo $nome_get." ".$sobrenome_get;
							}
						}
					?>
				</div>
				-->
				<div>
					<?php
						if (!isset($_COOKIE[$cookie_name])) {
							echo "Cookie chamado ". $cookie_name . " não está setado.";
						} else {
							echo "Cookie chamado ". $cookie_name . " está setado.<br>";
							echo "Valor é ".$_COOKIE[$cookie_name];
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>