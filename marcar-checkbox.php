<?php

require_once "conexao.php";

mysqli_query($conexao, "SET NAMES 'utf8';");
$lista = mysqli_query($conexao,"SELECT id, nome FROM usuario ORDER BY nome ASC");
$total = mysqli_num_rows($lista);
 		
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Marcar checkbox</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
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
            	<table  border="1" style="border-collapse: collapse;width:100%;background:#F5F6CE;border-color:#bbb;" cellpadding="2" cellspacing="0">
            		<thead>
            		<tr>

            			<th class="id"> ID   </th>
            			<th class="nome"> Nome </th>
            			<th class="funcao"> Função</th>
            		</tr>
            		</thead>
            		<tbody>
            	<?php while($linha = mysqli_fetch_array($lista)) { ?>
							<tr class="linha_home" onmouseover="javascript:style.background='#fbfbfb'"  onmouseout="javascript:style.background=''">		
								
								<td>
							       <input type="checkbox" id="sel1" name="numeros[]" value="<?=$linha['id']; ?>" onclick="verificaChecks()" >
							    </td>
							    <td>
							       <?php echo $linha["nome"];?>
							    </td>
							    <td>
							    	<?php $codigo = $linha['id'];?>
							    	 <a href="excluir.php?id=<?= $linha['id']; ?>"class="but botao-retornar"  OnClick="return confirm('Confirma Exclusão')">Excluir</a>
							    </td>
							</tr>

						<?php }; ?>
						</tbody>
					</table>
            </div>
           
            <input type="submit" class="submit" name="excluir-marcados" id="submit-excluir-marcados" value="marcados" />
            <input type="submit" class="submit" name="excluir-todos" OnClick="marcar()"id="submit-excluir-todos" value="todos" />
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
            var total = "<?= $total; ?>" ;   
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
