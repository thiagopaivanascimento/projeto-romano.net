<?php
include 'conexao/conexao.php';
include 'config/valida.php';

ini_set("default_charset", "ISO-8859-1");

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
		    <form action="" method="GET">
		     <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			 <tr>
			  <td align="right">Informe o cliente:</td>
			  <td align="left"><input type="text" size="50" name="txtCli" maxlength="60"></td>
			   <td align="left"><input type="submit" value="Pesquisar"  name="operacao" 
			   onClick="javascript:window.location.href = 'clientes.php'" class="botao"></td>
			   <td align="left"><input type="button" value="Voltar" onClick="javascript:window.location.href = 'cliente_detalhe.php'" class="botao"></td>
			 </tr>
			</table>
			</form>
		  </fieldset>
		  <p>
		  <?php
				
		include 'conexao/conexao.php';
		
		$operacao = isset($_GET["operacao"]);		
		$pesquisa = isset($_GET["Pesquisar"]);
		//$txtCPF = isset($_GET["txtCPF"]);
		
		
		 if($operacao == 'Pesquisar'){
		 	$txtCli = $_GET["txtCli"];
      		$sql = "SELECT cliente, cpf, endereco, bairro, cidade, telefone FROM clientes WHERE cliente LIKE '%$txtCli%' ORDER BY cliente";
	  		$res = pg_query($conexao, $sql); 
			if (pg_num_rows($res) == 0){
			  echo "<span class='mensagem'>Não há registro!</span>";
			  }else{
		   //Construção da consulta
        	echo "<table width='700' class='corpo_tabela' cellspacing='0' align='center'>";
			echo "<tr>";
			echo "<td class='topo_tabela' width='100'>Cliente</td>"; 
	    	echo "<td class='topo_tabela' width='100'>CPF</td>";
			echo "<td class='topo_tabela' width='100'>Endereço</td>";
			echo "<td class='topo_tabela' width='100'>Bairro</td>";
			echo "<td class='topo_tabela' width='100'>Cidade</td>";
			echo "<td class='topo_tabela' width='100'>Telefone</td>";
			echo "</tr>";
		 //Construção de um loop
		 for ($i = 0; $i < pg_num_rows($res); $i++ ) {
		     //Exibir registros na tabela
		     echo "<tr>";
			 echo "<td class='detalhe_tabela'>".$txtCli = pg_fetch_result($res, $i, "cliente")."</td>";
			 echo "<td class='detalhe_tabela'>".$txtCPF = pg_fetch_result($res, $i, "cpf")."</td>";
			 echo "<td class='detalhe_tabela'>".$txtEnd = pg_fetch_result($res, $i, "endereco")."</td>";
			 echo "<td class='detalhe_tabela'>".$txtBai = pg_fetch_result($res, $i, "bairro")."</td>";
			 echo "<td class='detalhe_tabela'>".$txtCid = pg_fetch_result($res, $i, "cidade")."</td>";
			 echo "<td class='detalhe_tabela'>".$txtTel = pg_fetch_result($res, $i, "telefone")."</td>";
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
	    Copyright© Romano.NET - Pizzaria online. Todos os direitos reservados.
	   </div>
	  </div>
 	</div>
 </body>
</html>