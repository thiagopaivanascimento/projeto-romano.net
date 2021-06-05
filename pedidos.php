<?php
include 'conexao/conexao.php';
include 'config/valida.php';

ini_set ("default_charset", "UTF-8");

?>
<html>
<head>
<title>..::Romano.NET - Pizzaria online::..</title>
  
  <link href="css/format.css" type="text/css" rel="stylesheet" />
  <link href="css/links.css" type="text/css" media="all" rel="stylesheet" />
  <script type="text/javascript" src="scripts/script_pedido.js"></script>

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
	   <li><a class="left" href="pedidos.php"><span><img align="left" src="imagens/icone_ped.gif" alt="Gerenciamento de Pedidos" />Pedidos</a></span></li>
	   <li><a class="left" href="precos.php"><span><img align="left" src="imagens/icone_preco.gif" alt="Preços de Pizzas" />Preços</a></span></li>
	   <li><a class="left" href="relatorios.php"><span><img align="left" src="imagens/icone_rel.gif" alt="Visualizar Relatórios" />Relatórios</span></a></li>
	   <li><a class="left" href="usuarios.php"><span><img align="left" src="imagens/icone_usu.gif" alt="Usuários Detalhes" />Usuários</span></a></li>
	   <li><a class="left" href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><span><img align="left" src="imagens/icone_sair.gif" alt="Logout" />Sair</span></a></li>
      </ul>
 	  </div>
	   <div id="conteudo">
	  <div align="center">
	  <?php

//Conexão ao Banco de Dados
include 'conexao/conexao.php';

//Operação de Pesquisa
$Pesquisar = isset($_POST['Pesquisar']);
if ( $Pesquisar == 'Pesquisar' ) {
	$txtTel = $_POST['txtTel'];
   if (empty($txtTel)){
   	echo "<script> alert('- O TELEFONE deve ser informado.') </script>";
	}
	 if( !empty($txtTel)) {
  $sql = "SELECT * from clientes where telefone='$txtTel'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) <= 0) {
     echo "<script> alert('Cliente não cadastrado') </script>";
  }
  else {
	$txtTel = pg_fetch_result($res,0,'telefone');
	$txtCli = pg_fetch_result($res,0,'cliente');
    $txtCPF = pg_fetch_result($res,0,'cpf');
	$txtEnd = pg_fetch_result($res,0,'endereco');
    $txtBai = pg_fetch_result($res,0,'bairro');
	}
  }
}

//Operação do ComboBox - Sabores da Pizzas

 $Buscar = isset($_POST['Buscar']);
if ( $Buscar == 'Buscar' ) {
  $sabor = $_POST['sabor'];
  if (empty($sabor)){
   	echo "<script> alert('- Por favor, informe o SABOR da PIZZA.') </script>";
	}
	 if( !empty($sabor)) {
  $sql = "SELECT * from pizzas where sabor='$sabor'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) <= 0) {
     echo "<script> alert('Esta PIZZA não está cadastrada') </script>";
  }
  else {
    $ing       = pg_fetch_result($res,0,'ingrediente');
    $preco_med = pg_fetch_result($res,0,'media');
    $preco_fam = pg_fetch_result($res,0,'familia');
	$preco_gig = pg_fetch_result($res,0,'gigante');
   }
 }
}

//Operação de Inclusão de Pedido

$Salvar = isset($_POST["Salvar"]);
 if ( $Salvar == 'Salvar' ){
     //$txtdata = $_POST["txtdata"];
	 $txtCli = $_POST["txtCli"];
	 $txtTel = $_POST["txtTel"]; 
	 $txtCPF = $_POST["txtCPF"]; 
	 $txtEnd = $_POST["txtEnd"]; 
	 $txtBai = $_POST["txtBai"]; 
	 $sabor = $_POST["sabor"]; 
	 $ing = $_POST["ing"]; 
	 $preco_med = isset($_POST["preco_med"]); 
	 $preco_fam = isset($_POST["preco_fam"]); 
	 $preco_gig = isset($_POST["preco_gig"]);
	 $tamanho_preco = isset($_POST['tamanho_preco']);
	 //$tam_preco = array($preco_med, $preco_fam,$preco_gig);
	 //var_dump($tam_preco); 
	 $refri = $_POST["refri"]; 
	 if (empty($txtTel)){
	 echo "<script> alert('- Por favor, informe o TELEFONE do CLIENTE.') </script>";
	 }
	 else if (empty($txtCPF)){ 
	 echo "<script> alert('- Por favor, informe o CPF do CLIENTE.') </script>";
	 }
	 else if (empty($txtCli)){ 
	 echo "<script> alert('- Por favor, informe o NOME do CLIENTE.') </script>";
	 }
	 else if (empty($sabor)){ 
	 echo "<script> alert('- Por favor, informe o SABOR da PIZZA.') </script>"; 	
	 }
	 else if (empty($txtEnd)){ 
	 echo "<script> alert('- Por favor, informe o ENDEREÇO do CLIENTE.') </script>";
	 }
	 else if (empty($txtBai)){ 
	 echo "<script> alert('- Por favor, informe o BAIRRO do CLIENTE.') </script>";
	 }
	 else if (empty($sabor)){ 
	 echo "<script> alert('- Por favor, informe o SABOR da PIZZA.') </script>";
	 }
	 else if (empty($ing)){ 
	 echo "<script> alert('- Por favor, informe os INGREDIENTES da PIZZA.') </script>";
	 }
	 else if ($tamanho_preco == ""){ 
	 echo "<script> alert('- Por favor, informe o TAMANHO da PIZZA.') </script>";
	 }
	 else if (empty($refri)){ 
	 echo "<script> alert('- Por favor, Escolha um REFRIGERANTE.') </script>";
	 } 
	 if (!empty($txtCPF) and !empty($txtCli) and !empty($sabor) and !empty($refri) and !empty($tam_preco)){
	  		 $sql = "INSERT into pedidos(cliente, endereco, sabor, tamanho_preco, refri) values
			 ('$txtCli', '$txtEnd', '$sabor', '$tamanho_preco', '$refri')";
			 $res = pg_query($sql);
			  if (pg_affected_rows($res)){
				echo "<script> alert('PEDIDO cadastrado com sucesso!') </script>";
				echo "<script language='javascript'>window.location.href='pedidos.php'</script>";
					} else {
					echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
				}
			}
		}
	
			   
  
?>
    <?php
		/*$txtTel = $_POST['txTel']) ? $_POST['txtTel'] : null;
		$txtCPF = $_POST['txCPF']) ? $_POST['txtCPF'] : null;
		$txtCli = $_POST['txCli']) ? $_POST['txtCli'] : null;
		$txtEnd = $_POST['txEnd']) ? $_POST['txtEnd'] : null;
		$txtBai = $_POST['txBai']) ? $_POST['txtBai'] : null;
		*/
	?>
	<form action="pedidos.php" method="POST" name="FormPed">
	  <table align="center" cellpadding="2" cellspacing="2">
	   <tr>
	    <td>
	     <fieldset class="box_cli">
	      <legend class="titulo">Dados do Cliente</legend>
	        <table align="left" cellpadding="2" cellspacing="2" witdh="250">
	         <tr>
	          <td align="left">Telefone
			  <!--&nbsp;&nbsp;<input type="submit" name="Pesquisar" value="Pesquisar" class="botao">-->
			  &nbsp;
				<a href="#" onClick="window.open('../projeto-romano.net/popup_clientes.php', 'popup_clientes', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=100, WIDTH=600, HEIGHT=400');">
				<img src="imagens/icone_buscar.gif" alt="Procurar Cursos" border="0" align="absmiddle"></a>&nbsp;
			  </td>
	        </tr>
	        <tr>
	 		 <td align="left"><input type="text" size="20" name="txtTel" value="<?php echo $txtTel; ?>" maxlength="12" onKeyUp="mascara_telefone()"></td> 
	        </tr>
	        <tr>
	         <td align="center" colspan="3"><hr></td>
	        </tr>
	        <tr>
	         <td align="left">Nome do Cliente</td>
	        </tr> 
	        <tr>
	         <td align="left"><input type="text" size="30" name="txtCli" value="<?php echo $txtCli ?>" maxlength="60" readonly="readonly"></td> 	 	 
	        </tr>
	 		<tr>
	 		 <td align="left">CPF</td>
	 		<tr>
	 		<tr>
	 		 <td align="left"><input type="text" size="20" name="txtCPF" value="<?php  echo $txtCPF; ?>" maxlength="14" onKeyUp="mascara_cpf()" readonly="readonly"></td> 
	 		</tr>
	 		<tr>
	 		 <td align="left">Endereço de Entrega</td>
	 		<tr>
	 		<tr>
	 		 <td align="left"><input type="text" size="20" name="txtEnd" value="<?php  echo $txtEnd; ?>" maxlength="60" readonly="readonly"></td> 	        
			</tr> 
	 		<tr>
	 		 <td align="left">Bairro</td>
	 		</tr>
	        <tr>
	 		 <td align="left"><input type="text" size="20" name="txtBai" value="<?php  echo $txtBai; ?>" maxlength="40" readonly="readonly"></td> 
	        </tr>
     	 </table>
	   </fieldset>
	   <fieldset class="box_pizza">
	    <legend class="titulo">Criar Pizza</legend>
	     <table align="left" cellpadding="2" cellspacing="2" witdh="500">
	      <tr>
	       <td align="left">Informe a Pizza &nbsp;&nbsp;
	 		<input type="text" size="20" name="sabor" value="<?php echo $sabor; ?>" maxlength="40">&nbsp;
			<input type="submit" value="Buscar" name="Buscar" class="botao">
	       </td>
	      </tr>
	      <tr>
	       <td align="left">&nbsp;</td>
	      </tr>
	      <tr>
	       <td align="left">(+ Adcionar / - Retirar) Ingredientes</td>
	      </tr>
	      <tr>
	       <td align="left"><textarea cols="30" rows="5" name="ing"><?php echo $ing; ?></textarea></td> 
	      </tr> 
	      <tr>
	       <td align="left">&nbsp;</td>
	      </tr>
	      <tr>
	      <td align="left">Escolha o tamanho:&nbsp;&nbsp;
		    <select name="tamanho_preco">
	            <option value="">Selecione o tamanho</option>   
	 			<option value="<?php echo $preco_med; ?>"><?php echo "Média - " .$preco_med;?></option> 
				<option value="<?php echo $preco_fam; ?>"><?php echo "Famíla - ". $preco_fam;?></option> 
				<option value="<?php echo $preco_gig; ?>"><?php echo "Gigante - ". $preco_gig;?></option> 
		    </select>
	 	</td>
	     </tr>
		 <tr>
	       <td align="left">&nbsp; <?php //var_dump($preco_med); ?></td>
	     </tr>
		 
	 <tr>
	 <td align="left">&nbsp;</td>
	 </tr>
	 <tr>
	 <td align="left">Refrigerante Grátis&nbsp;&nbsp; 
	 <select name="refri">
					<option value="">Escolha um refrigerante</option>
					<option value="COCA-COLA">COCA-COLA</option>
					<option value="COCA-COLA ZERO">COCA-COLA ZERO</option>
					<option value="GUARANA KUAT">GUARANÁ KUAT</option>
					<option value="GUARANA ANTARTICA">GUARANÁ ANTARTICA</option>
					<option value="FANTA">FANTA</option>
					<option value="FANTA UVA">FANTA UVA</option>
					<option value="SPRITE">SPRITE</option>
					</select>	
	 </td>
	 </tr>
	 </table>
	 </fieldset>

	 <!--Campo Operações -->
	 <br>
	 <fieldset class="box">
	 <table align="center" cellpadding="2" cellspacing="2" witdh="500">
	 <td align="left"><input type="reset" value="Limpar" class="botao"></td>
	 <td align="left"><input type="Submit" value="Salvar"  name="Salvar" class="botao">
			   </td>
			   <td align="left"><input type="button" value="Consultar"  name="Consultar" class="botao" onClick="javascript:window.location.href = 'pedidos_detalhes.php'"></td>
				<td align="left"><input type="button" value="Cancelar"  name="Cancelar"  class="botao" onClick="javascript:window.location.href = 'index.php'">
			   </td>
			 </tr>
			</table>
			</fieldset>
		   </td>
		  </tr> 
		 </table>
	    </form>
		</div>
	   </div>
	    <div id="rodape">
	    Copyright&copy; Romano.NET - Pizzaria online. Todos os direitos reservados.
	   </div>
	  </div>
 	</div>
 </body>
</html>
