<html>
	<head>
		<title>
			Aula 5 - PHP
		</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<?php
					include "conexao.php";

					$nome = "'Alan'";
					$matricula = 385179;
					$email = "'alan@externo.hue.br'";
					$telefone = "'(XX)0000-0000'";

					$sql = "INSERT INTO alunos (matricula, nome, email, telefone) VALUES (" . $matricula . ", " . $nome . ", " . $email . ", " . $telefone . ")";

					if ($conexao->query($sql)==TRUE) {
						echo "Dados Inseridos Com Sucesso";
					} else {
						echo "Erro: " . $sql . "<br>" . $conexao->error;
					}

					$sql = "UPDATE alunos SET telefone = '(85)3344-5566' WHERE nome = 'Alan'";
					if ($conexao->query($sql)==TRUE) {
						echo "Dados Atualizados Com Sucesso";
					} else {
						echo "Erro: " . $sql . "<br>" . $conexao->error;
					}
				?>

				<table class="table">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Matricula</th>
							<th>Email</th>
							<th>Telefone</th>
						</tr>
					</thead>
					<tbody>
					<?php

						$sql = "SELECT * FROM alunos ORDER BY nome, matricula ASC";
						$con = $conexao->query($sql) or die($conexao->error);

						while ($dado = $con->fetch_array()){ ?>
						<tr>
							<th><?php echo $dado["nome"]; ?></th>
							<th><?php echo $dado["matricula"]; ?></th>
							<th><?php echo $dado["email"]; ?></th>
							<th><?php echo $dado["telefone"]; ?></th>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>