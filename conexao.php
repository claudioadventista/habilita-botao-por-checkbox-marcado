<?php
	$host = "localhost"; 
	$banco = "marcar-checkbox"; // o nome do banco originalmente seria "ademir ou oficina"
	$usuario = "root"; 
	$senha = ""; 

	$conexao = mysqli_connect($host, $usuario, $senha, $banco); 
	mysqli_query($conexao, "SET NAMES 'utf8';");