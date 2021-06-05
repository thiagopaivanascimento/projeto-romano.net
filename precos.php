<?php
include 'conexao/conexao.php';
include 'config/valida.php';
?>
<html>
 <head>
  <title>..::Romano.NET - Pizzaria online::..</title>
  
  <link href="css/format.css" type="text/css" rel="stylesheet" />
  <link href="css/links.css" type="text/css" media="all" rel="stylesheet" />
  
 </head>
 <body alink="#FFFFFF" vlink="#FFFFFF">
 	<div align="center">
 	 <div id="geral">
 	   <div id="banner">
	   </div>
	   <div id="vista_toolbar">
	   <ul class="menubar">
	   <li><a class="left" href="index.php"><span><img align="left" src="imagens/icone_home.gif" alt="Página Inicial" />Home</span></a></li>
	   <li><a class="left" href="cliente_detalhe.php"><span><img align="left" src="imagens/icone_cli.gif" alt="Clintes Detalhes" />Clientes</span></a></li>
	   <li><a class="left" href="funcionarios_detalhes.php"><span><img align="left" src="imagens/icone_func.gif" alt="Funcionários Detalhes" />Funcionários</span></a></li>
	   <li><a class="left" href="pizzas_detalhes.php"><span><img align="left" src="imagens/icone_pizza.gif" alt="Cadastro de Pizzas" />Pizzas</span></a></li>
	   <li><a class="left" href="pedidos.php"><span><img align="left" src="imagens/icone_ped.gif" alt="Gerenciamento de Pedidos" />Pedidos</span></a></li>
	   <li><a class="left" href="precos.php"><span><img align="left" src="imagens/icone_preco.gif" alt="Preços de Pizzas" />Preços</span></a></li>
	   <li><a class="left" href="relatorios.php"><span><img align="left" src="imagens/icone_rel.gif" alt="Visualizar Relatórios" />Relatórios</span></a></li>
	   <li><a class="left" href="usuarios.php"><span><img align="left" src="imagens/icone_usu.gif" alt="Usários Detalhes" />Usuários</span></a></li>
	   <li><a class="left" href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><span><img align="left" src="imagens/icone_sair.gif" alt="Logout" />Sair</span></a></li>
      </ul>
 	  </div>
	   <div id="conteudo">
	    <div align="center">
		   <fieldset class="box">
		   <legend class="titulo">Tabela de Preços - Pizzas Registradas</legend>
		   <p>
		     <?php
	 	 include 'conexao/conexao.php';

  		$sql = "SELECT * from pizzas order by sabor";
  		$res = pg_query($conexao, $sql); 
		if (pg_num_rows($res) <= 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   }else{
	  //Construção da consulta
        	echo "<table width='500' class='corpo_tabela' cellspacing='0' align='center'>";
			echo "<tr>";
			echo "<td class='topo_tabela'>Sabores</td>"; 
	    	echo "<td class='topo_tabela'>Média (32cm)</td>";
			echo "<td class='topo_tabela'>Família (37cm)</td>";
			echo "<td class='topo_tabela'>Gigante (41cm)</td>";
			echo "</tr>";
		 //Construção de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
		  $sabor = pg_fetch_result($res, $i, "sabor");
		  $preco_med = pg_fetch_result($res, $i, "media");
		  $preco_fam = pg_fetch_result($res, $i, "familia"); 
		  $preco_gig = pg_fetch_result($res, $i, "gigante"); 
		   //Exibir registros na tabela
		     echo "<tr>";
			 echo "<td class='detalhe_tabela'>$sabor</td>";
			 echo "<td class='detalhe_tabela'>$preco_med</td>";
			 echo "<td class='detalhe_tabela'>$preco_fam</td>";
			 echo "<td class='detalhe_tabela'>$preco_gig</td>";
			}
			 echo "</tr>";
			 
		 echo "</table>";
	
	 } 
	
	pg_close($conexao);
	
?>
<p>
         </fieldset>
		</div>
	   </div>
	    <div id="rodape">
	    Copyright© Romano.NET - Pizzaria online. Todos os direitos reservados.
	   </div>
	  </div>
 	</div>
 </body>
</html>
