<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/popup.css" type="text/css" />
    <script language="JavaScript">
        function retornarPesquisa(txtCli, txtCPF, txtEnd, txtBai, txtTel) {
            window.opener.document.forms[0].elements["txtCli"].value = txtCli;
            window.opener.document.forms[0].elements["txtCPF"].value = txtCPF;
            window.opener.document.forms[0].elements["txtEnd"].value = txtEnd;
            window.opener.document.forms[0].elements["txtBai"].value = txtBai;
            window.opener.document.forms[0].elements["txtTel"].value = txtTel;
            window.close();
}

</script>

</head>
<body>

<div id="geral">
    <div align="center">
	 <br>
	 <?php
	  //Conexão com o banco de dados
	  include '/conexao/conexao.php';
	
        $txtTel = $_POST['txtTel'];
        $txtCli = $_POST['txtCli'];
        $txtCPF = $_POST['txtCPF'];
        $txtEnd = $_POST['txtEnd'];
        $txtBai = $_POST['txtBai'];

	  $sql = "SELECT cpf, cliente, endereco, bairro, telefone FROM clientes";
	  $res = pg_query($conexao, $sql);  
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   }else{
	    //Construção da consulta
		echo "<p><span class='titulo'>Lista de Clientes</span></p>";
		echo "<hr>";
		echo "<br />";
       	echo "<table width='500' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='200' align='center'>CPF</td>"; 
		echo "<td class='topo_tabela' width='200' align='center'>CLIENTE</td>"; 
		echo "<td class='topo_tabela' width='200' align='center'>ENDEREÇO</td>";
		echo "<td class='topo_tabela' width='200' align='center'>BAIRRO</td>"; 
        echo "<td class='topo_tabela' width='200' align='center'>TELEFONE</td>"; 
        echo "<td class='topo_tabela' width='100' align='center'>&nbsp;</td>";
		echo "</tr>";
		 //Construção de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
	     echo "<tr>";
  		  $txtCli = pg_fetch_result($res, $i, "cliente");
		  $txtCPF = pg_fetch_result($res, $i, "cpf");
		  $txtEnd = pg_fetch_result($res, $i, "endereco");
		  $txtBai  = pg_fetch_result($res, $i, "bairro");
          $txtTel  = pg_fetch_result($res, $i, "telefone");
          $javascript = "javascript:retornarPesquisa(".$txtCli.", '".$txtCPF."', '".$txtEnd."', '".$txtBai."', '".$txtTel."')";
		  //Exibir registros na tabela
		echo "<td class='detalhe_tabela' align='center'>$txtCli</td>"; 
        echo "<td class='detalhe_tabela' align='center'>$txtCPF</td>"; 
		echo "<td class='detalhe_tabela' align='center'>$txtEnd</td>"; 
		echo "<td class='detalhe_tabela' align='center'>$txtBai</td>";  
        echo "<td class='detalhe_tabela' align='center'>$txtTel</td>";  
		echo "<td class='detalhe_tabela' align='center'>
			  <a href='javascript:retornarPesquisa(\"".$txtCli."\", \"".$txtCPF."\", \"".$txtEnd."\", \"".$txtBai."\", \"".$txtTel."\")'>CARREGAR</a></td>";
		}		   
		
			echo "</tr>";
		}
	
		echo "</table>";
	  echo "<br>";
		 
	pg_close($conexao);
	
?>
</div>
</body>
</html>