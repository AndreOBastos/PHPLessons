<html lan="en">
	<head>
		<title>WebDev - PHP - Aula 2</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="row">
			<div class="col-md-4 text-center">
				<?php
					echo"<h1>Hackerzão Mostrando as Senhas</h1>";

					/**
					* Classe de Teste para aula de PHP
					*/
					class Usuarios
					{
						private $id;
						private $login;
						private $senha;
						public $email;
						protected $tipo_conta;
						
						function __construct($novo_usuario, $nova_senha)
						{
							$this->login = $novo_usuario;
							$this->senha = $nova_senha;
						}

						public function getUsuario()
						{
							return $this->login;
						}

						public function getSenha()
						{
							return $this->senha;
						}
					}

					function printUsuario($usuario){
						echo "<div class='bg-primary'> Usuário = ".$usuario->getUsuario()."</div>";
					echo "<div class='bg-info'> Senha = ".$usuario->getSenha()."</div>";
					}

					$primeiro_usuario = new Usuarios('PETComp','123');
					$segundo_usuario = new Usuarios('André','456');
					printUsuario($primeiro_usuario);
					printUsuario($segundo_usuario);
				?>
			</div>
		</div>
	</body>
</html>