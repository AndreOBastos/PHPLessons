<html>
	<head>
		<title>Aula 4</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
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
				include "conexao.php";

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
	</body>
</html>