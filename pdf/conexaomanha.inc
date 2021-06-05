<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>
<?php
$conecta = pg_connect("host=localhost port=5432 dbname=phpmanha user=postgres password=post");
if (!$conecta) { // Aqui testa se a conexão foi estabelecida
die ('Falha na conexão!!!');
}
?>
</BODY>
</HTML>
