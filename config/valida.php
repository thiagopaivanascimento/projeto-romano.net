<?php
//Definir tipo de charset ISO-8859-1
ini_set("default_charset", "iso-8859-1");

session_name('sistema');
session_start();
if (isset($_SESSION["login_usuario"]) != null) { 
	$loginbusca = $_SESSION["login_usuario"];
}

if (isset($_SESSION["senha_usuario"]) != null) {
 $senhabusca = isset($_SESSION["senha_usuario"]);
}

if (isset($_SESSION["nome_usuario"]) != null) {
 $nomebusca = isset($_SESSION["nome_usuario"]);
}


if(!(empty($loginbusca) and empty($senhabusca) and empty($nomebusca))){
  include "conexao/conexao.php";
  $sql = "Select * from usuarios where login = '$loginbusca'";
  $res = pg_query($sql);
   if(pg_num_rows($res) == 1)
    {
	 if($senhabusca != pg_fetch_result($res, 0, "senha"))
	  {
	   unset ($_SESSION['login_usuario']);
	   unset ($_SESSION['senha_usuario']);
	   echo "<script> alert('Você não efetuou o LOGIN') </script>";
	   echo "<script language='javascript'>window.location.href = 'login.php'</script>";
	   exit;
	  } 
    }
	else
	{ 
	   unset ($_SESSION['login_usuario']);
	   unset ($_SESSION['senha_usuario']);
	   echo "<script> alert('Você não efetuou o LOGIN') </script>";
	   echo "<script language='javascript'>window.location.href = 'login.php'</script>";
	   exit;
	 }
	}
	else
	 {
	 echo "<script> alert('Você não efetuou o LOGIN') </script>";
	 echo "<script language='javascript'>window.location.href = 'login.php'</script>";
	 exit;
	}
  
 ?>
