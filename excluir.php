<?php
	require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Excluir</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<center><h3>Aqui fica o código para excluir</h3>
		<div class="contagem">
			<a href="marcar-checkbox.php"  class="but">Voltar</a>
			<div class="checkbox">
				<table  border="1" style="border-collapse: collapse;width:100%;background:#F5F6CE;border-color:#bbb;" cellpadding="2" cellspacing="0">
					<thead>
		            	<tr>

		        			<th class="id"> ID   </th>
		        			<th class="nome"> Nome </th>
		        		</tr>
		            </thead>
		            <tbody>	
						<?php 		
							if ((isset($_POST['excluir-todos']))OR(isset($_POST['excluir-marcados']))OR(isset($_GET['id']))){
								if (isset($_POST['numeros'])) {
									$ordemImpressao = $_POST['numeros'];
									foreach ($ordemImpressao as $numero) {
									 	$sql = mysqli_query($conexao,"SELECT * FROM usuario WHERE id='$numero'");
									 	$linha = mysqli_fetch_array($sql);
									 	echo "<tr><td style='padding:7px;'>".$linha['id']."</td><td>".$linha['nome']."</td></tr>";
									};
								}else{
									$numero = $_GET['id'];
									 	$sql = mysqli_query($conexao,"SELECT * FROM usuario WHERE id='$numero'");
									 	$linha = mysqli_fetch_array($sql);
									 	echo "<tr><td style='padding:7px;'>".$linha['id']."</td><td>".$linha['nome']."</td></tr>";
								};
							};				
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>