<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Aula 1 de UWeb</title>
	</head>
	<body>
		<div style="text-align:center;">
			<?php
				//Comentário
				/*
					Comentário de grandes proporções
				*/
				$var = "Variável!</br>";
				echo "Olá, Mundo!<br/>";
				echo $var;
				$var = 610;
				echo $var;
				echo "</br>";

				$vet = array(10,20);
				//$vet[0] = 10;
				//$vet[1] = 20;
				echo $vet[0];
				echo "</br>";
				echo $vet[1];
				echo "</br>";

				$txt = "W3Schools.com";
				echo "Utilizem o " . $txt; 

				$var = 1;
				switch ($var) {
					case 1:
						echo "</br>";
						echo "Um!";
						echo "</br>";
						break;
					
					default:
						echo "</br>";
						echo "Default!";
						echo "</br>";
						break;
				}

				$cores = array("vermelho","azul");
				

				function nomeFuncao($funcVar = array("nada foi passado")){
					foreach ($funcVar as $valor) {
						echo $valor."<br>";
					}
				}

				nomeFuncao($cores);
				nomeFuncao();
			?>
		</div>
	</body>
</html>