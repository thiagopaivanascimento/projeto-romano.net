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
  <script type="text/javascript" src="scripts/script_pizza.js"></script>
  
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
		   <?php
include 'conexao/conexao.php';

//Opera��o de Pesquisa
$Pesquisar = isset($_GET['Pesquisar']);
if ( $Pesquisar == 'Pesquisar' ) {
  $txtLogin = isset($_GET['txtLogin']);
  if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	 if( !empty($txtLogin)) {
  $sql = "SELECT * from usuarios where login='$txtLogin'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) <= 0) {
     echo "<script> alert('Usu�rio n�o cadastrado') </script>";
  }
  else {
    $txtUsu = pg_fetch_result($res,0,'nome');
    $txtLogin  = pg_fetch_result($res,0,'login');
    $txtSenha = pg_fetch_result($res,0,'senha');
	}
 }
}

//Opera��o de Inclus�o
$incluir = isset($_GET['Incluir']);
if ($incluir == 'Incluir') {

$txtUsu = $_GET['txtUsu'];
$txtLogin = $_GET['txtLogin'];
$txtSenha = $_GET['txtSenha'];
	if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	else if (empty($txtUsu)){
   	echo "<script> alert('- O NOME do USU�RIO deve ser informado.') </script>";
	}
	else if (empty($txtSenha)){
   	echo "<script> alert('- A SENHA deve ser informada.') </script>";
	}
	if ( !empty($txtUsu) and !empty($txtLogin) and !empty($txtSenha)){ 
$sql = "SELECT * from usuarios where login='$txtLogin'";
$res = pg_query($conexao, $sql);
if (pg_num_rows($res) > 0 ) {
echo "<script> alert('Este Login j� foi cadastrado!') </script>";
} else {
$txtUsu = $_GET['txtUsu'];
$txtLogin = $_GET['txtLogin'];
$txtSenha = $_GET['txtSenha'];
$sql = "insert into usuarios (nome, login, senha) values
('$txtUsu','$txtLogin','$txtSenha')";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Usu�rio cadastrado com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='usuarios.php'</script>";
} else {
echo "<script> alert('Houveram problemas na grava��o das informa��es.') </script>";
				}
			}
		}
	}
	
//Opera��o de Altera��o	
$alterar = isset($_GET['Alterar']);
if ($alterar == 'Alterar') {
$txtUsu = $_GET['txtUsu'];
$txtLogin = $_GET['txtLogin'];
$txtSenha = $_GET['txtSenha'];
	if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	else if (empty($txtUsu)){
   	echo "<script> alert('- O NOME do USU�RIO deve ser informado.') </script>";
	}
	else if (empty($txtSenha)){
   	echo "<script> alert('- A SENHA deve ser informada.') </script>";
	}
	if ( !empty($txtUsu) and !empty($txtLogin) and !empty($txtSenha)){ 
$txtLogin = isset($_GET['txtLogin']);
$sql = "SELECT * FROM usuarios WHERE login = '$login'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este Login n�o foi cadastrada!') </script>";
} else {
$txtUsu = $_GET['txtUsu'];
$txtLogin = $_GET['txtLogin'];
$txtSenha = $_GET['txtSenha'];
$sql = "UPDATE usuarios set nome='txtUsu, senha='txtSenha' where login = '$txtLogin'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informa��es alteradas com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='usuarios.php'</script>";
} else {
echo "<script> alert('Houveram problemas na altera��o das informa��es') </script>";
				}
			}
		}
	}
// Opera��o de Exclus�o
$excluir = isset($_GET['Excluir']);
if ($excluir == 'Excluir') {
$txtlogin = $_GET['txtLogin'];
  if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	 if( !empty($txtLogin)) {
$txtlogin = $_GET['txtLogin'];
$sql = "select * from usuarios where login = '$txtLogin'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este Usu�rio n�o foi cadastrado!') </script>";
} else {
$sql = "delete from usuarios where login = '$txtLogin'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Usu�rio exclu�do com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='usuarios.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclus�o das informa��es') </script>";
}
}
}
}
?>
		   <fieldset class="box">
		    <legend class="titulo">Cadastramento de Usu�rios</legend>
			<form action="" method="GET" name="FormUsu">
			 <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			<tr>
			<td align="right">Login:</td>
			<td align="left"><input type="text" size="15" name="txtLogin" value="<?php echo isset($txtLogin); ?>" maxlength="10"></td>
			<td align="left"><input type="submit" name="Pesquisar" value="Pesquisar" class="botao"></td>
			</tr>
			<tr>
			<td align="right">Senha:</td>
			<td align="left"><input type="password" size="15" name="txtSenha" value="<?php echo isset($txtSenha); ?>" maxlength="60"></td>
			</tr>
			<tr>
			<td align="right">Nome:</td>
            <td align="left"><input type="text" size="15" name="txtUsu" value="<?php echo isset($txtUsu); ?>" maxlength="20"><td>			            </tr> 
			</tr>
			</table>
			 <p>
			 	<br />
     		</fieldset>
			<p>
			<fieldset class="box">
			  <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			  <tr>
			   <td align="left"><input type="reset" value="Limpar" class="botao"></td>
			   <td align="left"><input type="submit" value="Incluir"  name="Incluir" class="botao" onClick="return confirm ('Deseja incluir este USU�RIO?')"></td>
			   <td align="left"><input type="submit" value="Alterar"  name="Alterar"  class="botao" onClick="return confirm ('Deseja editar este USU�RIO?')"></td>
			   <td align="left"><input type="submit" value="Excluir"  name="Excluir"  class="botao" onClick="return confirm ('Deseja excluir este USU�RIO?')"></td>
			   <td align="left"><input type="button" value="Consultar"  name="Consultar"  class="botao" onClick="javascript:window.location.href = 'usuarios_detalhes.php'"></td>
			 </tr>
			</table>
			</form>
		  </fieldset>
		  <p>
		</div>
	   </div>
	    <div id="rodape">
	    Copyright� Romano.NET - Pizzaria online. Todos os direitos reservados.
	   </div>
	  </div>
 	</div>
 </body>
</html>
