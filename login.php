<?php

//var_dump($_SERVER['REQUEST_METHOD']);

//Definir tipo de charset ISO-8859-1
ini_set("default_charset", "iso-8859-1");

$Entrar = isset($_GET['Entrar']);
if ($Entrar == 'Entrar') {
	$txtLogin = $_GET['txtLogin'];
	$txtSenha = $_GET['txtSenha'];

include 'conexao/conexao.php';

$sql = "SELECT * from usuarios where login='$txtLogin'";
$res = pg_query($sql);
	if (pg_num_rows($res)==0) {
		echo "<script> alert('Usuário Inválido, tente novamente') </script>"; 
		}else{
			if ($txtSenha != pg_fetch_result($res, 0, "senha")){
				echo "<script> alert('Senha Inválida, tente novamente') </script>"; 
					}else{
					$txtLogin  = pg_fetch_result($res, 0, 'login');
					$txtSenha  = pg_fetch_result($res, 0, 'senha');
					$txtNome   = pg_fetch_result($res, 0, 'nome');
					$txtStatus = pg_fetch_result($res, 0, 'status');
					session_name('sistema');
					session_start();
					$_SESSION["login_usuario"] = $txtLogin;
					$_SESSION["senha_usuario"] = $txtSenha;
					$_SESSION["nome_usuario"] = $txtNome;
					$_SESSION["status_usuario"] = $txtStatus;
					header ("Location: index.php");
			}
		}	
	}	

?>	
<html>
 <head>
  <title>..::Romano.NET - Pizzaria online::..</title>
  <meta charset="utf-8">
<style type="text/css" media="all">

body {
	background-image: url(imagens/fundo_imagem.jpg);
	background-repeat: repeat-x;
	background-position: top left;
	background-attachment: fixed;
	font-family:calibri;
	font-size: 12px;
 
}

#geral{
	width: 300px;
	height: 280px;
	margin-top: 100px;
}

#topo{
	width: 300px;
	height: 50px;
	background-image:url(imagens/barra_fundo.jpg);
	color:#FFFFFF;
	font-size: 18px;
	font-family: calibri;
	padding-top: 10px;
}

#conteudo{
	width: 300px;
	height: 300px;
	background-color:#FFFFFF;
	padding-top: 10px;
}

#rodape{
	width: 300px;
	height: 30px;
	background-image: url(imagens/rodape.jpg);
}

.botao{
	background-image: url(imagens/botao_color2.jpg);
	width: 80px;
	height: 25px;
	color: white;
	font: calibri;
	border: 1px outset #FF6464;
	text-decoration: none;
	font-weight: bold;
}

</style>  

   </head>
  <body alink="#FFFFFF" vlink="#FFFFFF">
  	 <div align="center"> 
	  <div id="geral">
	   	 <div id="topo">
		  Autenticação do Usuário
	      </div>		
		  <div id="conteudo">
		  <img src="imagens/logotipo.jpg" width="190" height="105" align="middle"><p><p>
		  <form action="" method="GET">
		  <table align="center" width="250" cellpadding="2" cellspacing="2">
		    <tr>
			 <td align="right">Login:</td>
			 <td align="left"><input type="text" name="txtLogin" maxlength="10" value="<?php $txtLogin; ?>" size="15"></td>
			</tr>
			<tr>
			 <td align="right">Senha:</td>
			 <td align="left"><input type="password" name="txtSenha" maxlength="10" value="<?php $txtSenha; ?>" size="15"></td> 
			</tr>
		   </table> 
		   <p>
		   <table align="center" width="250" cellpadding="2" cellspacing="2">
		   <tr>
		    <td colspan="3" align="center"><input type="submit" name="Entrar" value="Entrar" class="botao"></td>
		   </tr> 	
		   </table>
		   </form>
		  </div>
		    <div id="rodape">
          </div>
	  </div>
	 </div> 
 </body>
</html>
