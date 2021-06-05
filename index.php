	<?php

	include 'conexao/conexao.php';
	include 'config/valida.php';

	ini_set ("default_charset", "ISO-8859-1");

	?>
	<html>
	 <head>
	  <title>..::Romano.NET - Pizzaria online::..</title>
	  
	  <link href="./css/format.css" type="text/css" rel="stylesheet" />
	  <link href="./css/links.css" type="text/css" media="all" rel="stylesheet" />
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 </head>
	 <body alink="#FFFFFF" vlink="#FFFFFF">
	 	<div align="center">
	 	 <div id="geral">
	 	   <div id="banner"></div>
		    <div id="vista_toolbar">
		      <ul class="menubar">
			   <li>
			   	<a class="left" href="index.php">
			   		<span><img align="left" src="imagens/icone_home.gif" alt="Página Inicial" />Home</span>
			   	</a>
			   </li>
		       <li>
		       	<a class="left" href="cliente_detalhe.php">
		       		<span>
		       			<img align="left" src="imagens/icone_cli.gif" alt="Clintes Detalhes" />Clientes
		       		</span>
		       	</a>
		       </li>
		   	   <li>
		   	   	<a class="left" href="funcionarios_detalhes.php">
		   	   		<span>
		   	   			<img align="left" src="imagens/icone_func.gif" alt="Funcionários Detalhes" /> Funcion&aacute;rios
		   	   		</span>
		   	   	</a>
		   	   </li>
		       <li>
		       	<a class="left" href="pizzas_detalhes.php">
		       		<span>
		       			<img align="left" src="imagens/icone_pizza.gif" alt="Cadastro de Pizzas" />Pizzas
		       		</span>
		       	</a>
		       </li>
		       <li>
		       	<a class="left" href="pedidos.php">
		       		<span>
		       			<img align="left" src="imagens/icone_ped.gif" alt="Gerenciamento de Pedidos" />Pedidos
		       		</a>
		       	</span>
		       </li>
		       <li>
			   	<a class="left" href="precos.php">
			   		<span>
			   			<img align="left" src="imagens/icone_preco.gif" alt="Preços de Pizzas" />Preços
			   		</span>
			   	</a>	
			   	</li>
		   <li><a class="left" href="relatorios.php"><span><img align="left" src="imagens/icone_rel.gif" alt="Visualizar Relatórios" />Relatórios</span></a></li>
	   <li><a class="left" href="usuarios.php"><span><img align="left" src="imagens/icone_usu.gif" alt="Usários Detalhes" />Usuários</span></a></li>
		   <li><a class="left" href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><span><img align="left" src="imagens/icone_sair.gif" alt="Logout" />Sair</span></a></li>
	      </ul>
	 	  </div>
		   <div id="conteudo">
		    <div align="center">
		     <div align="right">
	           <span class="mensagem">Bem-vindo <?php echo $_SESSION["nome_usuario"];?> | <?php include 'config/data.php'; ?></span>
			 </div>
			<table align="center" cellpadding="10" cellspacing="10" width="550">
			<tr>
			<td align="center"><img align="middle" src="imagens/anuncio_cli.jpg"></td>
			<td align="center"><img align="middle" src="imagens/anuncio_ped.jpg"></td>
			</tr> 
			<tr>
			<td align="center"><img align="middle" src="imagens/anuncio_rel.jpg"></td>
			<td align="center"><img align="middle" src="imagens/anuncio_pizza.jpg"></td>
			</tr> 
		    </table>
			</div>
		   </div>
		    <div id="rodape">
		    Copyright©2008 Romano.NET - Pizzaria online. Todos os direitos reservados.
		   </div>
		  </div>
	 	</div>
	 </body>
	</html>
