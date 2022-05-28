<?php
    // Esse total vem da consulta ao banco 
	$ContaExcluidos = 5;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
        <style>
          
			*{
				margin:0;
				padding:0;
			}

			body {
				font-family: Helvetica, Arial, sans-serif;
				background:#F2F2F2;
				text-transform: uppercase;
				text-shadow: -1px -1px 0 rgba(0,0,0,0.3);
				font-weight: bold;
				letter-spacing:2px;
				
			}

			a{
				text-decoration: none;
				color: black;
			}

			input[type='checkbox']{
				zoom:1.7;
				margin-top:10px;
			}

			h3{
				text-align: center;
				padding:10px 0;
				background: #ebd409;


			}

			.but{ 
				border:1px solid #ccc;
				border-radius:3px;
				font-size: 12px;
				padding:10px 12px;
				font-family: arial, helvetica, sans-serif;
				text-decoration: none;
				text-transform: uppercase;
				text-shadow: -1px -1px 0 rgba(0, 0, 0, 0.302);
				font-weight: bold;
				letter-spacing:2px;
				background: #E6E6E6;
				cursor:pointer;
				margin-left:5px;
			}

			.but:hover{
				background: #ddd;
			}

			.contagem{
				position:relative;
				margin-top:25px;
				padding:0 10px;
				color:black;
			}

			.retornarMarcados{
				opacity:0.2;
				pointer-events:none;
			}

			.checkbox{
				position: relative;
				top:20px;
				margin-top:5px;
				background: #fff;
				border:1px solid #aaa;
				border-radius: 5px;
				padding:0 10px 13px 10px;
				width:250px;
			}

			.check{
				position: relative;
				top:-6px;
				margin-left:10px;
			}

			.botao-retornar{
				position: relative;
				top:-6px;
				margin-left:10px;

			}

			.info{
				position: relative;
				background: #ddd;
				padding:5px 10px;
				top:30px;
				text-transform: none;
				text-shadow: none;
				font-weight: normal;
				letter-spacing:0;
			}

			.submit{
				display;none;
			}

        </style>
	</head>
<body>
	<h3>PHP - habilitar botão por checkbox marcado</h3>
	<div class="contagem">	
		
        <form action="excluir.php" name="form-excluir" method="POST">
            <a href="javascript:marcar()" class="but" > Marcar Todos </a>						     
            <a href="javascript:desmarcar()" class="but" > Desmarcar Todos </a>							  	
            <label for="submit-excluir-marcados" class="but retornarMarcados" id="retornarMarcados" OnClick="return confirm('Confirma Exclusão dos selecionados?')" > Excluir Marcados </label>
            <label for="submit-excluir-todos" class="but" OnClick="return confirm('Confirma Exclusão de Todos?')"> Excluir Todos </label>		
            
            <div class="checkbox">
                <input type="checkbox" id="sel1" name="numeros[]" onclick="verificaChecks()" ><span class="check"> 1 </span>
                <a href="excluir.php?codigo=$codigo" class="but botao-retornar"  OnClick="return confirm('Confirma Exclusão')">Excluir individual</a><br>
                <input type="checkbox" id="sel2" name="numeros[]" onclick="verificaChecks()" ><span class="check"> 2 </span>
                <a href="excluir.php?codigo=$codigo" class="but botao-retornar"  OnClick="return confirm('Confirma Exclusão')">Excluir individual</a><br>
                <input type="checkbox" id="sel3" name="numeros[]" onclick="verificaChecks()" ><span class="check"> 3 </span>
                <a href="excluir.php?codigo=$codigo" class="but botao-retornar"  OnClick="return confirm('Confirma Exclusão')">Excluir individual</a><br>
                <input type="checkbox" id="sel4" name="numeros[]" onclick="verificaChecks()" ><span class="check"> 4 </span>
                <a href="excluir.php?codigo=$codigo" class="but botao-retornar"  OnClick="return confirm('Confirma Exclusão')">Excluir individual</a><br>
                <input type="checkbox" id="sel5" name="numeros[]" onclick="verificaChecks()" ><span class="check"> 5 </span>
                <a href="excluir.php?codigo=$codigo" class="but botao-retornar"  OnClick="return confirm('Confirma Exclusão')">Excluir individual</a>
            </div>
            <div class="info">
                <span>1 - Habilita <b>todos</b> os botões <b>EXCLUIR INDIVIDUAL</b> se <b>nenhum</b> checkbox estiver marcado</span><br>
                <span>2 - Desabilita <b>todos</b> os botões <b>EXCLUIR INDIVIDUAL</b> se <b>algum</b> checkbox estiver marcado</span><br>
                <span>3 - Habilita o botão <b>EXCLUIR MARCADOS</b> se <b>dois ou mais</b> checkbox estiverem marcado</span><br>
                <span>4 - Desabilita o botão <b>EXCLUIR MARCADOS</b> se <b>todos</b> checkbox estiverem marcado</span><br>
            </div>
            <input type="submit" class="submit" name="excluir-marcados" id="submit-excluir-marcados" value="marcados" />
            <input type="submit" class="submit" name="excluir-todos" id="submit-excluir-todos" value="todos" />
        </form>
    </div>
	
	<script type="text/javascript">

		// função que verifica se todos os checkbox foram marcados		
		function verificaChecks() {
			let classe = document.querySelectorAll("a.botao-retornar");
			let retornaMarcados = document.getElementById("retornarMarcados");
			let aChk = document.getElementsByName("numeros[]");  
			let teste = 0;
			let contaChecado = 0;
				
			// atribui à variável javascriprum um valor vindo do php
            var total = "<?= $ContaExcluidos; ?>" ;   
				for (let i=0;i<aChk.length;i++){  
					if (aChk[i].checked == true){               
						teste ++;  
						contaChecado ++;           
					 }  else {
						teste --; 
					}	
					// desmarca os botões indivuduais se marcar um checkbox
					if(contaChecado < 1 ){
						classe.forEach(function(element){
							element.style.opacity="1";
							element.style.pointerEvents ="all";
					 	});			
					} else {
						classe.forEach(function(element){
							element.style.opacity="0.2";
							element.style.pointerEvents ="none";	
						});	
					}				               
					/*  
					desabilita o botão de Retornar Marcados: 
					Se não houver nenhum checkbox marcado,
					Se houver apenas um checkbox marcado,
					Se todos os checkbox estiverem marcados. 					      
					*/					  
				    if(teste == total|| teste == -total || contaChecado < 2 ){	       
						retornaMarcados.style.opacity = "0.2";	
						retornaMarcados.style.pointerEvents ="none";					
					} else {
						retornaMarcados.style.opacity = "1";	
						retornaMarcados.style.pointerEvents ="all";					
					}				               
				}
		}

        // Função para marcar todos
		function marcar(){
					let boxes = document.getElementsByName("numeros[]");
					let classe = document.querySelectorAll("a.botao-retornar");
					retornarMarcados.style.opacity="0.2";
					retornarMarcados.style.pointerEvents ="none";

				    for(let i = 0; i < boxes.length; i++)
				      boxes[i].checked = true;
					
					  classe.forEach(function(element){
						element.style.opacity="0.2";
						element.style.pointerEvents ="none";
						
					  });		 
				}

        // Função para desmarcar todos        
		function desmarcar(){
				    let boxes = document.getElementsByName("numeros[]");
					let classe = document.querySelectorAll("a.botao-retornar");
					retornarMarcados.style.opacity="0.2";
					retornarMarcados.style.pointerEvents ="none";
				    
					for(let i = 0; i < boxes.length; i++)
				      boxes[i].checked = false;

					  classe.forEach(function(element){
						element.style.opacity="1";
						element.style.pointerEvents ="all";
					  });
				} 
	</script>
</body>
</html>
