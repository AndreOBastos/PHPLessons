<html>
	<head>
		<title>
			Exercício 1 - PHP
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
		<script
			src="https://code.jquery.com/jquery-3.1.1.min.js"
			integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous">
		</script>

		<style type="text/css">
			.formDiv{
				background-color: #c7c5bf;
				border-radius: 34px 34px 34px 34px;
    			-moz-border-radius: 34px 34px 34px 34px;
				-webkit-border-radius: 34px 34px 34px 34px;
				border: 2px solid #949494;
			}
			.sexy_line { 
    			margin: 25px 5px;
    			height: 1px;
    			border: 0;
    			background: black;
    			background: -webkit-gradient(linear, 0 0, 100% 0, from(#c7c5bf), to(#c7c5bf), color-stop(50%, white));
			}
		</style>

		<script type="text/javascript">
			function queryCheck(){
				if(document.getElementById("insert").checked){
					document.getElementById("insertQuery").style.display="block";
					document.getElementById("deleteQuery").style.display="none";
					document.getElementById("updateQuery").style.display="none";
				}
				if(document.getElementById("delete").checked){
					document.getElementById("insertQuery").style.display="none";
					document.getElementById("deleteQuery").style.display="block";
					document.getElementById("updateQuery").style.display="none";
				}
				if(document.getElementById("update").checked){
					document.getElementById("insertQuery").style.display="none";
					document.getElementById("deleteQuery").style.display="none";
					document.getElementById("updateQuery").style.display="block";
				}
			}
		</script>
	</head>
	<body>
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="row">
						<div class="col-md-offset-2 col-md-8 formDiv">
							<h4 class="text-center" style="padding-top:30px;">
								<?php
									include "conexao.php";
								?>
							</h4>
							<div class="sexy_line"></div>
							<form action="query.php" method="post" style="padding-bottom:30px;">
								<div class="form-group text-center" id="checkBoxes">

									<label class="radio-inline"><input type="radio" name="queryType" id="insert" value="insert" onclick="javascript:queryCheck();" checked> Insert</label>
									<label class="radio-inline"><input type="radio" name="queryType" id="delete" value="delete" onclick="javascript:queryCheck();"> Delete</label>
									<label class="radio-inline"><input type="radio" name="queryType" id="update" value="update" onclick="javascript:queryCheck();"> Update</label>

								</div>
								<div class="sexy_line"></div>
								<div class="form-group" id="insertQuery" style="display:block;">

									<h5><strong>Inserir os seguintes dados:</strong></h5><br>
									<label for="matricula">Matrícula:</label><br>
									<input type="text" class="form-group" name="insertMat"><br>

									<label for="nome">Nome:</label><br>
									<input type="text" class="form-group" name="insertNome"><br>

									<label for="telefone">Telefone:</label><br>
									<input type="text" class="form-group" name="insertTel"><br>

									<label for="matricula">Email:</label><br>
									<input type="text" class="form-group" name="insertEm"><br>

								</div>
								<div class="form-group" id="deleteQuery" style="display:none;">

									<h5> <strong>Deletar com base em:</strong></h5><br>
									<label for="matricula">Matrícula:</label><br>
									<input type="text" class="form-group" name="deleteMat"><br>

									<label for="nome">Nome:</label><br>
									<input type="text" class="form-group" name="deleteNome"><br>

									<label for="telefone">Telefone:</label><br>
									<input type="text" class="form-group" name="deleteTel"><br>

									<label for="matricula">Email:</label><br>
									<input type="text" class="form-group" name="deleteEm"><br>

								</div>
								<div class="form-group row" id="updateQuery" style="display:none;">

									<div class="col-md-6">
										<h5><strong>Alterar dados com os valores:</strong></h5><br>
										<label for="matricula">Matrícula:</label><br>
										<input type="text" class="form-group" name="updateFromMat"><br>

										<label for="nome">Nome:</label><br>
										<input type="text" class="form-group" name="updateFromNome"><br>

										<label for="telefone">Telefone:</label><br>
										<input type="text" class="form-group" name="updateFromTel"><br>

										<label for="matricula">Email:</label><br>
										<input type="text" class="form-group" name="updateFromEm"><br>
									</div>
									<div class="col-md-6">
										<h5><strong>Mudar para esses valores:</strong></h5><br>
										<label for="matricula">Matrícula:</label><br>
										<input type="text" class="form-group" name="updateToMat"><br>

										<label for="nome">Nome:</label><br>
										<input type="text" class="form-group" name="updateToNome"><br>

										<label for="telefone">Telefone:</label><br>
										<input type="text" class="form-group" name="updateToTel"><br>

										<label for="matricula">Email:</label><br>
										<input type="text" class="form-group" name="updateToEm"><br>
									</div>

								</div>
								<input type="submit">
							</form>
						</div>
					</div>
					<br><br>
					<table class="table">
						<thead class="thead-inverse">
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
		</div>
	</body>
</html>