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
		   <fieldset class="box2">
		    <legend class="titulo">Relat�rios</legend>
			<p>
			<table align="center" cellpadding="3" cellspacing="3" witdh="500" border="5" bordercolor="#FF6464">
			 <tr>
			  <td align="center"><a href="relatorios/cliente_rel.php">Clientes</a></td>
			  <td align="center"><a href="relatorios/funcionario_rel.php">Funcion�rios</a></td>
			   <td align="center"><a href="relatorios/pizza_rel.php">Pizzas</a></td>
   			   <td align="center"><a href="relatorios/pedido_rel.php">Pedidos</a></td>
			   <td align="center"><a href="relatorios/usuario_rel.php">Usu�rios</a></td>
			 </tr>
			 </table>
			</form>
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