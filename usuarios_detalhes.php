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
		    <form action="usuarios_detalhes.php" method="GET">
		     <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			 <tr>
			  <td align="right">Informe o usu�rio:</td>
			  <td align="left"><input type="text" size="50" name="sabor" value="<? $txtUsu; ?>" maxlength="60"></td>
			   <td align="left"><input type="submit" value="Pesquisar"  name="operacao" class="botao"></td>
			   <td align="left"><input type="button" value="Voltar" 
			   onClick="javascript:window.location.href = 'usuarios.php'" class="botao"></td>
			 </tr>
			</table>
			</form>
		  </fieldset>
		  <p>
		<?php
				
		include 'conexao/conexao.php';
		
		$operacao = isset($_GET["operacao"]);		
		$pesquisa = isset($_GET["Pesquisar"]);
		$excluir = isset($_GET["Excluir"]);
		$txtUsu = isset($_GET["txtUsu"]);
		
		 if($operacao == 'Pesquisar'){
      		$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$txtUsu' ORDER BY nome";
	  		$res = pg_query($conexao, $sql); 
			if (pg_num_rows($res) == 0){
			  echo "<span class='mensagem'>N�o h� registro!</span>";
			  } else {
		   //Constru��o da consulta
        	echo "<table width='300' class='corpo_tabela' cellspacing='0' align='center'>";
			echo "<tr>";
			echo "<td class='topo_tabela' width='150'>Usu�rio</td>"; 
	    	echo "<td class='topo_tabela' width='150'>Login</td>";
			echo "</tr>";
		 //Constru��o de um loop
		 for ($i = 0; $i < pg_num_rows($res); $i++ ) {
		     //Exibir registros na tabela
		     echo "<tr>";
			 echo "<td class='detalhe_tabela'>".$txtUsu = pg_fetch_result($res, $i, "nome")."</td>";
			 echo "<td class='detalhe_tabela'>".$txtLogin  = pg_fetch_result($res, $i, "login")."</td>";
			 echo "</tr>";
		}	 
		 echo "</table>";
	}  
		
	pg_close($conexao);
}

?>
		</div>
	   </div>
	    <div id="rodape">
	    Copyright� Romano.NET - Pizzaria online. Todos os direitos reservados.
	   </div>
	  </div>
 	</div>
 </body>
</html>
