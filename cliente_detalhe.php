<?php
include 'conexao/conexao.php';
include 'config/valida.php';

ini_set("default_charset", "UTF-8");

?>

<html>
 <head>
  <title>..::Romano.NET - Pizzaria online::..</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/format.css" type="text/css" rel="stylesheet" />
  <link href="css/links.css" type="text/css" media="all" rel="stylesheet" />
  <script type="text/javascript" src="scripts/script_cliente.js"></script>
 
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

//Conexão ao Banco de Dados
include 'conexao/conexao.php';

//Operação de Pesquisa
$Pesquisar = isset($_GET['Pesquisar']);
	if  ($Pesquisar == 'Pesquisar') { 
  		 $txtCPF = $_GET['txtCPF'] != null;
   		if (empty($txtCPF)){
   			echo "<script> alert('- O CPF deve ser informado.') </script>";
		}
	 	if( !empty($cpf)) {
			$sql = "SELECT * FROM clientes WHERE cpf = '$txtCPF'";
			$res = pg_query($conexao, $sql);
				if (pg_num_rows($res) <= 0) {
     				echo "<script> alert('Cliente não cadastrado') </script>";
  				} else {
					$txtCPF = pg_fetch_result($res,0,'cpf');
					$txtCli = pg_fetch_result($res,0,'cliente');
					$txtEnd = pg_fetch_result($res,0,'endereco');
					$txtBai = pg_fetch_result($res,0,'bairro');
					$txtCEP = pg_fetch_result($res,0,'cep');
					$txtCid = pg_fetch_result($res,0,'cidade');
					$uf     = pg_fetch_result($res,0,'uf');
					$txtTel = pg_fetch_result($res,0,'telefone');
   				}
 		}
	}

//Operação de Inclusão
$incluir = isset($_GET['Incluir']);
if ($incluir == 'Incluir') {
$txtCPF = isset($_GET['txtCPF']);
$txtCli = $_GET['txtCli'];
$txtEnd = $_GET['txtEnd'];
$txtBai = $_GET['txtBai'];
$txtCEP = $_GET['txtCEP'];
$txtCid = $_GET['txtCid'];
$uf = $_GET['uf'];
$txtTel = $_GET['txtTel'];
	if (empty($txtCPF)){
   	echo "<script> alert('- O CPF deve ser informado.') </script>";
	}
	else if (empty($txtCli)){
   	echo "<script> alert('- O CLIENTE deve ser informado.') </script>";
	}
	else if (empty($txtEnd)){
   	echo "<script> alert('- O ENDEREÇO deve ser informado.') </script>";
	}
	else if (empty($txtBai)){
   	echo "<script> alert('- O BAIRRO deve ser informado.') </script>";
	}
	else if (empty($txtCEP)){
   	echo "<script> alert('- O CEP deve ser informado.') </script>";
	}
	else if (empty($txtCid)){
   	echo "<script> alert('- A CIDADE deve ser informada.') </script>";
	}
	else if (empty($uf)){
   	echo "<script> alert('- A UF deve ser informada.') </script>";
	}
	else if (empty($txtTel)){
   	echo "<script> alert('- O Telefone deve ser informado.') </script>";
	}
	if ( !empty($txtCPF) and !empty($txtCli) and !empty($txtEnd) and !empty($txtBai) and !empty($txtCEP) 
	and !empty($txtCid) and !empty($uf) and !empty($txtTel)) {
$sql = "SELECT * from clientes where cpf='$txtCPF'";
$res = pg_query($conexao, $sql);
if (pg_num_rows($res) > 0 ) {
echo "<script> alert('Este cliente já foi cadastrado!') </script>";
} else {

$txtCPF = $_GET['txtCPF'];
$txtCli = $_GET['txtCli'];
$txtEnd = $_GET['txtEnd'];
$txtBai = $_GET['txtBai'];
$txtCEP = $_GET['txtCEP'];
$txtCid = $_GET['txtCid'];
$uf = $_GET['uf'];
$txtTel = $_GET['txtTel'];

$sql = "INSERT into clientes (cpf, cliente, endereco, bairro, cep, cidade, uf, telefone) values
('$txtCPF', '$txtCli', '$txtEnd', '$txtBai', '$txtCEP', '$txtCid', '$uf', '$txtTel')";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Cliente cadastrado com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='clientes.php'</script>";
} else {
echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
				}
			}
		}
	}
//Operação Alteração
$alterar = isset($_GET['Alterar']);
if ($alterar == 'Alterar') {
$txtCPF = $_GET['txtCPF'];
$txtCli = $_GET['txtCli'];
$txtEnd = $_GET['txtEnd'];
$txtBai = $_GET['txtBai'];
$txtCEP = $_GET['txtCEP'];
$txtCid = $_GET['txtCid'];
$uf = $_GET['uf'];
$txtTel = $_GET['txtTel'];
	if (empty($txtCPF)){
   	echo "<script> alert('- O CPF deve ser informado.') </script>";
	}
	else if (empty($txtCli)){
   	echo "<script> alert('- O CLIENTE deve ser informado.') </script>";
	}
	else if (empty($txtEnd)){
   	echo "<script> alert('- O ENDEREÇO deve ser informado.') </script>";
	}
	else if (empty($txtBai)){
   	echo "<script> alert('- O BAIRRO deve ser informado.') </script>";
	}
	else if (empty($txtCEP)){
   	echo "<script> alert('- O CEP deve ser informado.') </script>";
	}
	else if (empty($txtCid)){
   	echo "<script> alert('- A CIDADE deve ser informada.') </script>";
	}
	else if (empty($uf)){
   	echo "<script> alert('- A UF deve ser informada.') </script>";
	}
	else if (empty($txtTel)){
   	echo "<script> alert('- O Telefone deve ser informado.') </script>";
	}
	if ( !empty($txtCPF) and !empty($txtCli) and !empty($txtEnd) and !empty($txtBai) and !empty($txtCEP) 
	and !empty($txtCid) and !empty($uf) and !empty($txtTel)) {
		$sql = "select * from clientes where cpf = '$txtCPF'";
		$res = pg_query($sql);
		if ( pg_num_rows($res) <= 0 ) {
		echo "<script> alert('Esta cliente não foi cadastrado!') </script>";
		} else {

		$txtCPF = $_GET['txtCPF'];
		$txtCli = $_GET['txtCli'];
		$txtEnd = $_GET['txtEnd'];
		$txtBai = $_GET['txtBai'];
		$txtCEP = $_GET['txtCEP'];
		$txtCid = $_GET['txtCid'];
		$uf = $_GET['uf'];
		$txtTel = $_GET['txtTel'];

$sql = "update clientes set cliente='$txtCli', endereco='$txtEnd', bairro='$txtBai', cep='$txtCEP', uf='$uf', telefone='$txtTel' where cpf = '$txtCPF'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informações alteradas com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='clientes.php'</script>";
} else {
echo "<script> alert('Houveram problemas na alteração das informações') </script>";
				}
			}
		}
	}
//Operação de Exclusão
$excluir = isset($_GET['Excluir']);
if ($excluir == 'Excluir') {
	$txtCPF = $_GET['txtCPF'];
		if (empty($txtCPF)){
   			echo "<script> alert('- O CPF deve ser informado.') </script>";
		}
	 		if( !empty($txtCPF)) {
				$sql = "SELECT * FROM clientes WHERE cpf = '$txtCPF'";
				$res = pg_query($sql);
					if ( pg_num_rows($res) <= 0 ) {
						echo "<script> alert('Este cliente não foi cadastrado!') </script>";
					} else {
						$sql = "delete from clientes where cpf = '$txtCPF'";
						$res = pg_query($sql);
					if (pg_affected_rows($res)) {
						echo "<script> alert('Cliente excluído com sucesso!') </script>";
						echo "<script language='javascript'>window.location.href='clientes.php'</script>";
					} else {
						echo "<script> alert('Houveram problemas na exclusão das informações') </script>";
							}
					}	
			}
}
?>		   
		   <fieldset class="box">
		    <legend class="titulo">Cadastramento de Clientes</legend>
			 <form action="cliente_detalhe.php" name="FormCli" method="GET">
		 <table align="center" cellpadding="2" cellspacing="2" witdh="500">
		 <tr>
 		 <td align="right">CPF:</td>
 		 <td align="left"><input type="text" size="20" name="txtCPF" onKeyUp="mascara_cpf()" value="<?php echo isset($txtCPF); ?>" maxlength="14"></td>
		  <td align="left">
		  <input type="submit" name="Pesquisar" value="Pesquisar" class="botao">
		  </td>
		  </tr>
		  <tr>
		  <td align="center" colspan="3"><hr></td>
		  </tr>
		  <tr>
		  <td align="right">Nome do cliente:</td>
		  <td align="left"><input type="text" size="50" name="txtCli" value="<?php echo isset($txtCli); ?>" maxlength="60"></td>
		  </tr> 
		  <tr>
		  <td align="right">Endereço:</td>
		  <td align="left"><input type="text" size="50" name="txtEnd" value="<?php echo isset($txtEnd); ?>" maxlength="60"></td>
		  </tr> 
		  <tr>
		  <td align="right">Bairro:</td>
		  <td align="left"><input type="text" size="30" name="txtBai" value="<?php echo isset($txtBai); ?>" maxlength="40"></td>
		  </tr> 
		  <tr>
		  <td align="right">CEP:</td>
		  <td align="left"><input type="text" size="20" name="txtCEP" onKeyUp="mascara_cep()" value="<?php echo isset($txtCEP); ?>" maxlength="9"></td>
		  </tr> 
		  <tr>
		  <td align="right">Cidade:</td>
		  <td align="left"><input type="text" size="50" name="txtCid" value="<?php echo isset($txtCid); ?>" maxlength="60"></td>
		  </tr> 
		  <tr>
		  <td align="right">UF:</td>
		  <td align="left"><select name="uf">
					<?php
					include 'conexao/conexao.php';
					$sql_est = "SELECT * FROM estados;";	
					$res = pg_query($sql_est);
					 echo "<option value=\"\" selected>Selecione o Estado</option>>";
					 for($i=0; $i<pg_num_rows($res); $i++){
					  $uf  = pg_fetch_result($res, $i,'uf');
					  $est = pg_fetch_result($res, $i,'estado');
					  $xuf = pg_fetch_result($res, $i,'uf');
						  if($uf == $xuf){
						    echo "<option value=\"$xuf\" selected>$uf - $est </option>>";
  								}else{
								    echo "<option value=\"$xuf\"> $est </option>>";
  									}
								}			
					?>
					</select>
					</td>
			 </tr> 
			 <tr>
			  <td align="right">Telefone:</td>
			  <td align="left"><input type="text" size="20" name="txtTel" onKeyUp="mascara_telefone()" value="<?php echo isset($txtTel); ?>" maxlength="12"></td>
			 </tr> 
			</table>
			</fieldset>
			<p>
			<fieldset class="box">
			  <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			   <td align="left"><input type="reset" value="Limpar" class="botao"></td>
			   <td align="left"><input type="Submit" value="Incluir"  name="Incluir" class="botao" onClick="return confirm ('Deseja incluir o registro do cliente?')">
			   </td>
			   <td align="left"><input type="submit" value="Alterar"  name="Alterar"  class="botao" onClick="return confirm ('Deseja editar o registro do cliente?')"></td>
			   <td align="left"><input type="submit" value="Excluir"  name="Excluir"  class="botao" onClick="return confirm ('Deseja excluir o cliente?')">
			   </td>
			   <td align="left"><input type="button" value="Consultar"  name="Consultar"  class="botao" onClick="javascript:window.location.href = 'clientes.php'"></td>
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