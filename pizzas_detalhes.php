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
  <script type="text/javascript" src="scripts/script_pizza.js"></script>
  
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
	   <li><a class="left" href="usuarios.php"><span><img align="left" src="imagens/icone_usu.gif" alt="Usuários Detalhes" />Usuários</span></a></li>
	   <li><a class="left" href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><span><img align="left" src="imagens/icone_sair.gif" alt="Logout" />Sair</span></a></li>
      </ul>
 	  </div>
	   <div id="conteudo">
	    <div align="center">
		   <?php
		   include 'conexao/conexao.php';


//Operação de Pesquisa
$Pesquisar = isset($_GET['Pesquisar']);
if ( $Pesquisar == 'Pesquisar' ) {
  $sabor = isset($_GET['sabor']);
  if (empty($sabor)){
   	echo "<script> alert('- O SABOR da PIZZA deve ser informado.') </script>";
	}
	 if( !empty($sabor)) {
  $sql = "SELECT * from pizzas where sabor='$sabor'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) <= 0) {
     echo "<script> alert('Pizza não cadastrada') </script>";
  }
  else {
    $sabor = pg_fetch_result($res,0,'sabor');
    $ing  = pg_fetch_result($res,0,'ingrediente');
    $preco_med = pg_fetch_result($res,0,'media');
    $preco_fam  = pg_fetch_result($res,0,'familia');
	$preco_gig  = pg_fetch_result($res,0,'gigante');
   }
 }
}

//Operação de Inclusão
$incluir = isset($_GET['Incluir']);
if ($incluir == 'Incluir') {

$sabor = $_GET['sabor'];
$ing = $_GET['ing'];
$preco_med = $_GET['preco_med'];
$preco_fam = $_GET['preco_fam'];
$preco_gig = $_GET['preco_gig'];
	if (empty($sabor)){
   	echo "<script> alert('- O SABOR deve ser informado.') </script>";
	}
	else if (empty($ing)){
   	echo "<script> alert('- OS INGREDIENTES deve ser informado.') </script>";
	}
	else if (empty($preco_med)){
   	echo "<script> alert('- O PREÇO da PIZZA MÉDIA deve ser informado.') </script>";
	}
	else if (empty($preco_fam)){
   	echo "<script> alert('- O PREÇO da PIZZA FAMÍLIA deve ser informado.') </script>";
	}
	else if (empty($preco_gig)){
   	echo "<script> alert('- O PREÇO da PIZZA GIGANTE deve ser informado.') </script>";
	}
	if ( !empty($sabor) and !empty($ing) and !empty($preco_med) and !empty($preco_fam) and !empty($preco_gig)){ 
$sql = "SELECT * from pizzas where sabor='$sabor'";
$res = pg_query($conexao, $sql);
if (pg_num_rows($res) > 0 ) {
echo "<script> alert('Esta pizza já foi cadastrada!') </script>";
} else {
$sabor = $_GET['sabor'];
$ing = htmlentities($_GET['ing']);
$preco_med = $_GET['preco_med'];
$preco_fam = $_GET['preco_fam'];
$preco_gig = $_GET['preco_gig'];
$sql = "INSERT INTO pizzas (sabor,ingrediente,media,familia,gigante) VALUES
('$sabor','$ing','$preco_med','$preco_fam','$preco_gig')";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Pizza cadastrada com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pizza.php'</script>";
} else {
echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
				}
			}
		}
	}
	
//Operação de Alteração	
$alterar = isset($_GET['Alterar']);
if ($alterar == 'Alterar') {
$sabor = $_GET['sabor'];
$ing = $_GET['ing'];
$preco_med = $_GET['preco_med'];
$preco_fam = $_GET['preco_fam'];
$preco_gig = $_GET['preco_gig'];
	if (empty($sabor)){
   	echo "<script> alert('- O SABOR deve ser informado.') </script>";
	}
	else if (empty($ing)){
   	echo "<script> alert('- OS INGREDIENTES deve ser informado.') </script>";
	}
	else if (empty($preco_med)){
   	echo "<script> alert('- O PREÇO da PIZZA MÉDIA deve ser informado.') </script>";
	}
	else if (empty($preco_fam)){
   	echo "<script> alert('- O PREÇO da PIZZA FAMÍLIA deve ser informado.') </script>";
	}
	else if (empty($preco_gig)){
   	echo "<script> alert('- O PREÇO da PIZZA GIGANTE deve ser informado.') </script>";
	}
	if ( !empty($sabor) and !empty($ing) and !empty($preco_med) and !empty($preco_fam) and !empty($preco_gig)){
$sabor = $_GET['sabor'];
$sql = "select * from pizzas where sabor = '$sabor'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Esta pizza não foi cadastrada!') </script>";
} else {
$sabor = $_GET['sabor'];
$ing = $_GET['ing'];
$preco_med = $_GET['preco_med'];
$preco_fam = $_GET['preco_fam'];
$preco_gig = $_GET['preco_gig'];
$sql = "update pizzas set ingrediente='$ing', media='$preco_med', familia='$preco_fam', gigante='$preco_gig' 
where sabor = '$sabor'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informações alteradas com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pizza.php'</script>";
} else {
echo "<script> alert('Houveram problemas na alteração das informações') </script>";
				}
			}
		}
	}
// Operação de Exclusão
$excluir = isset($_GET['Excluir']);
if ($excluir == 'Excluir') {
$sabor = $_GET['sabor'];
  if (empty($sabor)){
   	echo "<script> alert('- O SABOR da PIZZA deve ser informado.') </script>";
	}
	 if( !empty($sabor)) {
$sabor = $_GET['sabor'];
$sql = "select * from pizzas where sabor = '$sabor'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Esta pizza não foi cadastrada!') </script>";
} else {
$sql = "delete from pizzas where sabor = '$sabor'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Pizza excluída com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pizza.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclusão das informações') </script>";
}
}
}
}
?>
		   <fieldset class="box">
		    <legend class="titulo">Cadastramento de Pizzas</legend>
			<form action="" method="GET" name="FormPizza">
			 <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			 <tr>
			  <td align="right">Sabor da pizza:</td>
			  <td align="left"><input type="text" size="50" name="sabor" value="<?php echo isset($sabor); ?>" maxlength="60"></td>
			  <td align="left"><input type="submit" name="Pesquisar" value="Pesquisar" class="botao"></td>
			 </tr> 
			 <tr>
			  <td align="right">Ingredientes:</td>
			  <td align="left"><textarea name="ing" cols="38" rows="5"> <?php echo isset($ing); ?> </textarea></td>
			 </tr> 
			 </table>
			<fieldset class="box2">
			<legend class="titulo">Tamanhos - Preços</legend>
			 <table align="center" cellpadding="5" cellspacing="5" witdh="500">
			 <tr>
			  <td align="center">Média<br>(32cm)</td>
			  <td align="center">Família<br>(37cm)</td>
			  <td align="center">Gigante<br>(41cm)</td>
			 </tr> 
			 <tr>
<td align="left">R$&nbsp;<input type="text" size="10" name="preco_med" value="<?php echo isset($preco_med); ?>" onKeyUp="mascara_valor1()" maxlength="5"></td>
<td align="left">R$&nbsp;<input type="text" size="10" name="preco_fam" value="<?php echo isset($preco_fam); ?>" onKeyUp="mascara_valor2()" maxlength="5"></td>
<td align="left">R$&nbsp;<input type="text" size="10" name="preco_gig" value="<?php echo isset($preco_gig); ?>" onKeyUp="mascara_valor3()" maxlength="5"></td>
			 </tr> 
			</table>
			<p>
			 </fieldset>
			 <p>
		</fieldset>
			<p>
			<fieldset class="box">
			  <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			  <tr>
			   <td align="left"><input type="reset" value="Limpar" class="botao"></td>
			   <td align="left"><input type="submit" value="Incluir"  name="Incluir" class="botao" onClick="return confirm ('Deseja incluir esta pizza?')"></td>
			   <td align="left"><input type="submit" value="Alterar"  name="Alterar"  class="botao" onClick="return confirm ('Deseja editar está pizza?')"></td>
			   <td align="left"><input type="submit" value="Excluir"  name="Excluir"  class="botao" onClick="return confirm ('Deseja excluir está pizza?')"></td>
			   <td align="left"><input type="button" value="Consultar"  name="Consultar"  class="botao" onClick="javascript:window.location.href = 'pizza.php'"></td>
			 </tr>
			</table>
			</form>
		  </fieldset>
		  <p>
		</div>
	   </div>
	    <div id="rodape">
	    Copyright&copy; Romano.NET - Pizzaria online. Todos os direitos reservados.
	   </div>
	  </div>
 	</div>
 </body>
</html>
