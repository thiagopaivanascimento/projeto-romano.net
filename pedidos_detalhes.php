<?php
include 'conexao/conexao.php';
include 'config/valida.php';

ini_set ("default_charset", "ISO-8859-1");

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
	   <li><a class="left" href="index.php"><span><img align="left" src="imagens/icone_home.gif" alt="P�gina Inicial" />Home</span></a></li>
	   <li><a class="left" href="cliente_detalhe.php"><span><img align="left" src="imagens/icone_cli.gif" alt="Clintes Detalhes" />Clientes</span></a></li>
	   <li><a class="left" href="funcionarios_detalhes.php"><span><img align="left" src="imagens/icone_func.gif" alt="Funcion�rios Detalhes" />Funcion�rios</span></a></li>
	   <li><a class="left" href="pizzas_detalhes.php"><span><img align="left" src="imagens/icone_pizza.gif" alt="Cadastro de Pizzas" />Pizzas</span></a></li>
	   <li><a class="left" href="pedidos.php"><span><img align="left" src="imagens/icone_ped.gif" alt="Gerenciamento de Pedidos" />Pedidos</span></a></li>
	   <li><a class="left" href="precos.php"><span><img align="left" src="imagens/icone_preco.gif" alt="Pre�os de Pizzas" />Pre�os</span></a></li>
	   <li><a class="left" href="relatorios.php"><span><img align="left" src="imagens/icone_rel.gif" alt="Visualizar Relat�rios" />Relat�rios</span></a></li>
	   <li><a class="left" href="usuarios.php"><span><img align="left" src="imagens/icone_usu.gif" alt="Us�rios Detalhes" />Usu�rios</span></a></li>
	   <li><a class="left" href="logout.php" onClick="return confirm('Voc� deseja realmente sair?')"><span><img align="left" src="imagens/icone_sair.gif" alt="Logout" />Sair</span></a></li>
      </ul>
 	  </div>
	   <div id="conteudo">
	    <div align="center">
		   <fieldset class="box">
		   <legend class="titulo">Tabela de Pedidos</legend>
		 <p>
		<?php
				
		    include_once 'conexao/conexao.php';
		
			$sql = "SELECT * FROM pedidos ORDER BY cliente";
	  		$res = pg_query($conexao, $sql); 
			if (pg_num_rows($res) == 0){
			  echo "<span class='mensagem'>N�o h� registro!</span>";
			  }else{
		   //Constru��o da consulta
        	echo "<table width='750' class='corpo_tabela' cellspacing='0' align='center'>";
			echo "<tr>";
      		echo "<td class='topo_tabela' width='150'>Clientes</td>"; 
	    	echo "<td class='topo_tabela' width='250'>Endere�o</td>";
			echo "<td class='topo_tabela' width='150'>Tamanho | Pre�o</td>";
			echo "<td class='topo_tabela' width='50'>Refrigerante</td>";
			echo "</tr>";
		 //Constru��o de um loop
		 for ($i = 0; $i < pg_num_rows($res); $i++ ) {
		     //Exibir registros na tabela
		     echo "<tr>";
			 echo "<td class='detalhe_tabela'>".$txtCli = pg_fetch_result($res, $i, "cliente")."</td>";
			 echo "<td class='detalhe_tabela'>".$txtEnd = pg_fetch_result($res, $i, "endereco")."</td>";
			 echo "<td class='detalhe_tabela'>".$tam_preco = pg_fetch_result($res, $i, "tamanho_preco")."</td>";
			 echo "<td class='detalhe_tabela'>".$refri = pg_fetch_result($res, $i, "refri")."</td>";
			 echo "</tr>";
		}	 
		 echo "</table>";
	}  
		
	pg_close($conexao);


?>
        <p>
		</fieldset> 
		</div>
	   </div>
	    <div id="rodape">
	    Copyright� Romano.NET - Pizzaria online. Todos os direitos reservados.
	   </div>
	  </div>
 	</div>
 </body>
</html>
