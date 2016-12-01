<html>
	<head>
		<title>
			Aula 5 - PHP
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
		<script
			src="https://code.jquery.com/jquery-3.1.1.min.js"
			integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous">
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
				padding:40px;
			}
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

	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="absolute-Center is-Responsive formDiv">
					<h4 class="text-center" style="padding-top:30px;">
						<?php
							include "conexao.php";
						?>
					</h4>
					<div class="sexy_line"></div>
					<?php

						if ($_POST["queryType"] == "insert") {
							
							$sql = "INSERT INTO alunos (matricula, nome, email, telefone) VALUES (" . $_POST["insertMat"] . ", '"  . $_POST["insertNome"] . "', '" . $_POST["insertEm"] . "', '" . $_POST["insertTel"] . "')";

							if ($conexao->query($sql)==TRUE) {
								echo "<p>Executada Operação:</p><p>" . $sql . "</p><p>Dados Inseridos Com Sucesso</p>";
							} else {
								echo "<p>Erro:</p><p>" . $sql . "</p><p>" . $conexao->error . "</p>";
							}
						}
						if ($_POST["queryType"] == "delete") {

							$modified = FALSE;
							$deleteQuery = "";

							if (!empty($_POST["deleteMat"])) {
								$deleteQuery = $deleteQuery . "matricula=" . $_POST["deleteMat"];
								$modified = TRUE;
							}
							if (!empty($_POST["deleteNome"])) {
								if($modified){
									$deleteQuery = $deleteQuery . " AND nome='" . $_POST["deleteNome"] . "'";
								} else {
									$deleteQuery = $deleteQuery . "nome='" . $_POST["deleteNome"] . "'";
									$modified = TRUE;
								}
							}
							if (!empty($_POST["deleteTel"])) {
								if($modified){
									$deleteQuery = $deleteQuery . " AND telefone='" . $_POST["deleteTel"] . "'";
								} else {
									$deleteQuery = $deleteQuery . "telefone='" . $_POST["deleteTel"] . "'";
									$modified = TRUE;
								}
							}
							if (!empty($_POST["deleteEm"])) {
								if($modified){
									$deleteQuery = $deleteQuery . " AND email='" . $_POST["deleteEm"] . "'";
								} else {
									$deleteQuery = $deleteQuery . "email='" . $_POST["deleteEm"] . "'";
									$modified = TRUE;
								}
							}

							$sql = "DELETE FROM alunos WHERE " . $deleteQuery;
							
							if ($conexao->query($sql)==TRUE) {
								echo "<p>Executada Operação:</p><p>" . $sql . "</p><p>Dados Deletados Com Sucesso</p>";
							} else {
								echo "<p>Erro:</p><p>" . $sql . "</p><p>" . $conexao->error . "</p>";
							}
						}
						if ($_POST["queryType"] == "update") {
							$modifiedFrom = FALSE;
							$modifiedTo = FALSE;
							$fromQuery = "";
							$toQuery = "";

							// Writing the WHERE section of UPDATE

							if (!empty($_POST["updateFromMat"])) {
								$fromQuery = $fromQuery . "matricula=" . $_POST["updateFromMat"];
								$modifiedFrom = TRUE;
							}
							if (!empty($_POST["updateFromNome"])) {
								if($modifiedFrom){
									$fromQuery = $fromQuery . " AND nome='" . $_POST["updateFromNome"] . "'";
								} else {
									$fromQuery = $fromQuery . "nome='" . $_POST["updateFromNome"] . "'";
									$modifiedFrom = TRUE;
								}
							}
							if (!empty($_POST["updateFromTel"])) {
								if($modifiedFrom){
									$fromQuery = $fromQuery . " AND telefone='" . $_POST["updateFromTel"] . "'";
								} else {
									$fromQuery = $fromQuery . "telefone='" . $_POST["updateFromTel"] . "'";
									$modifiedFrom = TRUE;
								}
							}
							if (!empty($_POST["updateFromEm"])) {
								if($modifiedFrom){
									$fromQuery = $fromQuery . " AND email='" . $_POST["updateFromEm"] . "'";
								} else {
									$fromQuery = $fromQuery . "email='" . $_POST["updateFromEm"] . "'";
									$modifiedFrom = TRUE;
								}
							}

							// Writing the SET section of UPDATE

							if (!empty($_POST["updateToMat"])) {
								$toQuery = $toQuery . "matricula=" . $_POST["updateToMat"];
								$modifiedTo = TRUE;
							}
							if (!empty($_POST["updateToNome"])) {
								if($modifiedTo){
									$toQuery = $toQuery . ", nome='" . $_POST["updateToNome"] . "'";
								} else {
									$toQuery = $toQuery . "nome='" . $_POST["updateToNome"] . "'";
									$modifiedTo = TRUE;
								}
							}
							if (!empty($_POST["updateToTel"])) {
								if($modifiedTo){
									$toQuery = $toQuery . ", telefone='" . $_POST["updateToTel"] . "'";
								} else {
									$toQuery = $toQuery . "telefone='" . $_POST["updateToTel"] . "'";
									$modifiedTo = TRUE;
								}
							}
							if (!empty($_POST["updateToEm"])) {
								if($modifiedTo){
									$toQuery = $toQuery . ", email='" . $_POST["updateToEm"] . "'";
								} else {
									$toQuery = $toQuery . "email='" . $_POST["updateToEm"] . "'";
									$modifiedTo = TRUE;
								}
							}

							$sql = "UPDATE alunos SET " . $toQuery . " WHERE " . $fromQuery;
							
							if ($conexao->query($sql)==TRUE) {
								echo "<p>Executada Operação:</p><p>" . $sql . "</p><p>Dados Alterados Com Sucesso</p>";
							} else {
								echo "<p>Erro:</p><p>" . $sql . "</p><p>" . $conexao->error . "</p>";
							}
						}
					?>
					<div class="sexy_line"></div>
					<a href="trabalho1.php"><< Retornar</a>
				</div>
			</div>
		</div>
	</body>
</html>